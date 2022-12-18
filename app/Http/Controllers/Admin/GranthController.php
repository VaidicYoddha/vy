<?php

namespace App\Http\Controllers\Admin;

use App\Models\All\Language;
use Illuminate\Http\Request;
use App\Models\admin\Arshbook;
use App\Models\admin\Arshchapter;
use App\Http\Controllers\Controller;

class GranthController extends Controller
{
    public function index(Request $request)
    {
        $language = Language::where('is_visible','1')
                               ->with('arshbooks')
                                ->Paginate(5);
        $allBooks = Arshbook::select('arshbooks.id', 'languages.name')
            ->orderBy('arshbooks.id', 'asc')
            ->join('languages', 'arshbooks.language_id', 'languages.id')
            ->where('arshbooks.is_visible', '=', '1')->get();

        $books = Arshbook::where('is_visible','1')
                          ->Paginate(20);

            return view('ft.granth.index', [
                'allBooks' => $allBooks,
                'books' => $books,
                'language' => $language,
            ]);
    }

    public function chapterlist(String $lang_Slug, $bookno, $chapterno )
    {
        $allBooks = Arshbook::select('arshbooks.id', 'languages.name')
            ->orderBy('arshbooks.id', 'asc')
            ->join('languages', 'arshbooks.language_id', 'languages.id')
            ->where('arshbooks.is_visible', '=', '1')->get();

        $book = Arshbook::where('id', '=', $bookno)
                          ->where('is_visible','1')
                          ->get();

        $allChapters = Arshchapter::where('arshbook_id', '=', $bookno)
                                    ->where('id','=', $chapterno )
                                    ->where('is_visible','1')
                                    ->first();

        // $chapter = Arshchapter::where('id', $chapterno )
        //                         ->first();

        views($allChapters)->record();

                 $next_id = Arshchapter::where('id','>', $allChapters->id)->min('id');
                 $prev_id = Arshchapter::where('id','<', $allChapters->id)->max('id');
             return view('ft.granth.details', [
                    'allBooks' => $allBooks,
                    'allChapters' => $allChapters,
                    //'chapter' => $chapter,
                    'book' => $book,
             ])->with('next_id', Arshchapter::find($next_id))
                 ->with('prev_id', Arshchapter::find($prev_id));

    }

    public function search(Request $request)
    {
        $this->validate($request, ['search' => 'required|max:255']);
        $search = $request->search;
        $sp = Arshchapter::where('chapter_no', 'like', '%' .$search. '%' )
                      ->orwhere('title', 'like', '%' .$search. '%' )
                      ->orwhere('slug', 'like', '%' .$search. '%' )
                      ->orwhere('content', 'like', '%' .$search. '%' )
                      ->orderBy('id')->paginate(10)
                      ->map(function ($row) use ($search) {
                        $row->chapter_no = preg_replace('/(' . $search . ')/i', "<mark> <b>$1</b></mark>", $row->chapter_no);
                        $row->content = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->content);
                        $row->title = preg_replace('/(' . $search . ')/i', "<mark> <b>$1</b></mark>", $row->title);
                        $row->slug = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->slug);
                          return $row;
                             });

        //$sp->appends(['search' => $search]);

        return view('ft.granth.search', compact('sp','search'));

    }
}
