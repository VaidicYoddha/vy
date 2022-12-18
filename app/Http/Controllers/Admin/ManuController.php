<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Mshlok;
use Illuminate\Http\Request;
use App\Models\admin\Mchapter;
use App\Models\admin\MshlokDetail;
use App\Http\Controllers\Controller;

class ManuController extends Controller
{
    public function index(Request $request)
    {
        $allchapters = Mchapter::select('id', 'mchapter_no')
            ->orderBy('id', 'asc')
            ->where('is_visible', '=', '1')->get();
        $selectedChapter = ($request->get('chapter')) ? $request->get('chapter') : $allchapters->first()->id;

        $manusmruti = Mchapter::where('id', '=', $selectedChapter)
            ->orderBy('id', 'asc')
            ->first();
        if ( $allchapters && $allchapters->count() > 0)  {
            $allShloks = Mshlok::where('mchapter_id', '=', $selectedChapter)->get();

            if ($allShloks->count() > 0) {
                $selectedShlok = ($request->get('shlok')) ? $request->get('shlok') : $allShloks->first()->id;
                $shlokDetails = MshlokDetail::with('mshlok')
                    ->where('mshlok_id', '=', $selectedShlok)
                    ->get();
                $shloktitle = MshlokDetail::with('mshlok')
                    ->where('mshlok_id', '=', $selectedShlok)
                    ->first();

                $allShloks = Mshlok::paginate(20);


                //views($shlokDetails)->record();

                return view('ft.manu.index', [
                    'allchapters' => $allchapters,
                    'allShloks' => $allShloks,
                    'manusmruti' => $manusmruti,
                    'selectedShlok' => $selectedShlok,
                    'selectedChapter' => $selectedChapter,
                    'shlokDetails' => $shlokDetails,
                    'shloktitle' => $shloktitle,
                    'allShloks' => $allShloks,
                ]);//->with('next_id', MshlokDetail::find($next_id))
                //   ->with('prev_id', MshlokDetail::find($prev_id));
           }
       }
         //dd('front.manu.manu');
        return redirect('/manusmruti');
    }

    public function details(String $chapterno, $shlokno)
    {
        $allchapters = Mchapter::select('id', 'mchapter_no')
            ->orderBy('id', 'asc')
            ->where('is_visible', '=', '1')->get();

        $chapter = Mchapter::where('id', $chapterno)
                            ->first();

        $shlok = Mshlok::where('id', '=', $shlokno)
                            ->first();

        $shlokdetails = MshlokDetail::where('mchapter_id','=', $chapterno)
                                    ->where('mshlok_id','=', $shlokno)
                                    ->get();
        $details = MshlokDetail::first();
        $expiresAt = now()->addHours(1);
                views($details)
                ->cooldown($expiresAt)
                ->record();

                 $next_id = Mshlok::where('id','>', $shlok->id)->min('id');
                 $prev_id = Mshlok::where('id','<', $shlok->id)->max('id');
             return view('ft.manu.details', [
                    'allchapters' => $allchapters,
                    'shlok' => $shlok,
                    'chapter' => $chapter,
                    'shlokdetails' => $shlokdetails,
                    'details' => $details,
                ])->with('next_id', Mshlok::find($next_id))
                  ->with('prev_id', Mshlok::find($prev_id));

    }

    public function search(Request $request)
    {
        $this->validate($request, ['search' => 'required|max:255']);
        $search = $request->search;
        $sp = MshlokDetail::where('details', 'like', '%' .$search. '%' )
                            ->orwhere('mchapter_id', 'like', '%' .$search. '%' )
                            ->orwhere('mshlok_id', 'like', '%' .$search. '%' )
                            ->orderBy('id')->paginate(10)
                            ->map(function ($row) use ($search) {
                            $row->details = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->details);
                            $row->mchapter_id = preg_replace('/(' . $search . ')/i', "<mark> <b>$1</b></mark>", $row->mchapter_id);
                            $row->mshlok_id = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->mshlok_id);
                                return $row;
                                });

        //$sp->appends(['search' => $search]);

        return view('ft.manu.search', compact('sp','search'));

    }
}
