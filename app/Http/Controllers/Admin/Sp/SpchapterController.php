<?php

namespace App\Http\Controllers\Admin\Sp;

use App\Models\admin\Spbook;
use App\Models\All\Language;
use Illuminate\Http\Request;
use App\Models\admin\Spchapter;
use App\Http\Controllers\Controller;
use Termwind\Components\Span;

class SpchapterController extends Controller
{
        public function index(Request $request)
    {
       $allBooks = Spbook::select('spbooks.id', 'languages.name')
            ->orderBy('spbooks.id', 'asc')
            ->join('languages', 'spbooks.language_id', 'languages.id')
            ->where('spbooks.is_visible', '=', '1')->get();
        // $selectedBook = ($request->get('language')) ? $request->get('language') : $allBooks->first()->id;

        // $satyarthPrakash = Spbook::where('id', '=', $selectedBook)
        //     ->orderBy('id', 'asc')
        //     ->first();
        // if ($satyarthPrakash->count() > 0)  {
        //     $allChapters = Spchapter::where('spbook_id', '=', $selectedBook)->get();

        //     if ($allChapters->count() > 0) {
        //         $selectedChapter = ($request->get('chapter')) ? $request->get('chapter') : $allChapters->first()->id;
        //         $chapterDetails = Spchapter::with('spbook')
        //             ->where('spbook_id', '=', $selectedBook)
        //             ->where('id', '=', $selectedChapter)
        //             ->first();
                // views($chapterDetails)->record();

                // $next_id = Spchapter::where('id','>', $chapterDetails->id)->min('id');
                // $prev_id = Spchapter::where('id','<', $chapterDetails->id)->max('id');


                return view('ft.sp.index', [
                    'allBooks' => $allBooks,
                    // 'allChapters' => $allChapters,
                    // 'satyarthPrakash' => $satyarthPrakash,
                    // 'selectedBook' => $selectedBook,
                    // 'selectedChapter' => $selectedChapter,
                    // 'chapterDetails' => $chapterDetails,
                ]);

            //}


        return redirect('/sp');
    }

    public function chapterlist(String $lang_Slug, $chapter_slug)
    {
        $allBooks = Spbook::select('spbooks.id', 'languages.name')
            ->orderBy('spbooks.id', 'asc')
            ->join('languages', 'spbooks.language_id', 'languages.id')
            ->where('spbooks.is_visible', '=', '1')->get();

        $chapter = Spchapter::where('slug', $chapter_slug)
                                ->first();

        views($chapter)->record();

                 $next_id = Spchapter::where('id','>', $chapter->id)->min('id');
                 $prev_id = Spchapter::where('id','<', $chapter->id)->max('id');
             return view('ft.sp.details', [
                    'allBooks' => $allBooks,
                    'chapter' => $chapter,
                ])->with('next_id', Spchapter::find($next_id))
                  ->with('prev_id', Spchapter::find($prev_id));

    }

    public function search(Request $request)
    {
        $this->validate($request, ['search' => 'required|max:255']);
        $search = $request->search;
        $sp = spchapter::where('title', 'like', '%' .$search. '%' )
                      ->orwhere('content', 'like', '%' .$search. '%' )
                      ->orwhere('translator_id', 'like', '%' .$search. '%' )
                      ->orwhere('spbook_id', 'like', '%' .$search. '%' )
                      ->orderBy('id')->paginate(10)
                      ->map(function ($row) use ($search) {
                        $row->title = preg_replace('/(' . $search . ')/i', "<mark> <b>$1</b></mark>", $row->title);
                        $row->content = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->content);
                        $row->translator_id = preg_replace('/(' . $search . ')/i', "<mark> <b>$1</b></mark>", $row->translator_id);
                        $row->spbook_id = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->spbook_id);
                          return $row;
                             });

        //$sp->appends(['search' => $search]);

        return view('ft.sp.search', compact('sp','search'));

    }

    //      public function splanguage(String $lang_Slug)
    // {
    //     $languages = Language::where('is_visible', '1')->get();
    //     $language = Language::where('slug' , $lang_Slug)->first();

    //     $chapters = $language->spchapters()->where('is_visible', '1')->get();

    //     return view('ft.sp.chapters', compact('languages', 'chapters','language' ));
    // }


    //     public function details(String $slug,String  $lang_Slug)
    // {
    //     $languages = Language::where('is_visible', '1')->get();
    //     $language = Language::where('slug' , $lang_Slug)->first();

    //     $details = Spchapter::where('slug', $slug)
    //                 ->with('language:slug')
    //                 ->firstOrFail();

    //     $next_id = Spchapter::where('id','>', $details->id)->min('id');
    //     $prev_id = Spchapter::where('id','<', $details->id)->max('id');

    //     return view('ft.sp.details', compact('languages', 'language','details' ))
    //                                 ->with('next_id', Spchapter::find($next_id))
    //                                 ->with('prev_id', Spchapter::find($prev_id));
    // }


}
