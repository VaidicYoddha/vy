<?php

namespace App\Http\Controllers;

use App\Models\admin\Spbook;
use App\Models\admin\Spchapter;
use Illuminate\Http\Request;

class SptestController extends Controller
{
      public function index(Request $request)
    {
       $allBooks = Spbook::select('spbooks.id', 'languages.name')
            ->orderBy('spbooks.id', 'asc')
            ->join('languages', 'spbooks.language_id', 'languages.id')
            ->where('spbooks.is_visible', '=', '1')
            ->with('spchapters')->get();
    //    $selectedBook = ($request->get('language')) ? $request->get('language') : $allBooks->first()->id;
    //     $satyarthPrakash = Spbook::where('id', '=', $selectedBook)
    //         ->orderBy('id', 'asc')
    //         ->first();
    //     if ($satyarthPrakash->count() > 0)  {
    //         $allChapters = Spchapter::where('spbook_id', '=', $selectedBook)->get();

    //         if ($allChapters->count() > 0) {
    //             $selectedChapter = ($request->get('chapter')) ? $request->get('chapter') : $allChapters->first()->id;
    //             $chapterDetails = Spchapter::with('spbook')
    //                 ->where('spbook_id', '=', $selectedBook)
    //                 ->where('id', '=', $selectedChapter)
    //                 ->first();

        //         views($chapterDetails)->record();
                
        //         $next_id = Spchapter::where('id','>', $chapterDetails->id)->min('id');
        //         $prev_id = Spchapter::where('id','<', $chapterDetails->id)->max('id');
                
                
                return view('ft.sptest', [
                    'allBooks' => $allBooks,
                    // 'allChapters' => $allChapters,
                    // 'satyarthPrakash' => $satyarthPrakash,
                    // 'selectedBook' => $selectedBook,
                    // 'selectedChapter' => $selectedChapter,
                    //'chapterDetails' => $chapterDetails,
             
                ]);

        //    }
        // }        

        
    }


        public function chapterlist(Request $request, String $lang_id, $chapter_slug, $chapterno)
    {
        $allBooks = Spbook::select('spbooks.id', 'languages.name')
            ->orderBy('spbooks.id', 'asc')
            ->join('languages', 'spbooks.language_id', 'languages.id')
            ->where('spbooks.is_visible', '=', '1')->with('spchapters')->get();
        //  $selectedBook = ($request->get('language')) ? $request->get('language') : $allBooks->first()->id;
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
        //         views($chapterDetails)->record();
                
        //         $next_id = Spchapter::where('id','>', $chapterDetails->id)->min('id');
        //         $prev_id = Spchapter::where('id','<', $chapterDetails->id)->max('id');
            $chapter = Spchapter::where('slug', $chapter_slug)
                                ->where('chapter_no', $chapterno)
                                ->first();
                
                return view('ft.spchapterlist', [
                    'allBooks' => $allBooks,
                    // 'allChapters' => $allChapters,
                    // 'satyarthPrakash' => $satyarthPrakash,
                    // 'selectedBook' => $selectedBook,
                    // 'selectedChapter' => $selectedChapter,
                    // 'chapterDetails' => $chapterDetails,
                    'chapter' => $chapter,
                ]);

           //}
        //}        



    }


}
