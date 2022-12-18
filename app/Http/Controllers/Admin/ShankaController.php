<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Shankaque;
use App\Models\admin\Shankasub;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShankaController extends Controller
{
    public function index(Request $request)
    {
        // $allShanka = Shankaque::where('sub_id',Request::input('subject'))->paginate(100);

        $allSubjects = Shankasub::orderBy('id', 'asc')
        ->where('is_visible', '=', '1')->get();
        $selectedSubject = ($request->get('subject')) ? $request->get('subject') : $allSubjects->first()->id;

        $allShanka = Shankaque::where('sub_id', '=', $selectedSubject)->paginate(15);


            return view('ft.shanka.index', [
                'allShanka' => $allShanka,
                'allSubjects' => $allSubjects,
                'selectedSubject' => $selectedSubject,

            ]);
    }

    public function search(Request $request)
    {
        $this->validate($request, ['search' => 'required|max:255']);
        $search = $request->search;
        $shanka = Shankaque::where('author_id', 'like', '%' .$search. '%' )
                      ->orwhere('shanka', 'like', '%' .$search. '%' )
                      ->orwhere('samadhan', 'like', '%' .$search. '%' )
                      ->orwhere('sub_id', 'like', '%' .$search. '%' )
                      ->orderBy('id')->paginate(10)
                      ->map(function ($row) use ($search) {
                        $row->author_id = preg_replace('/(' . $search . ')/i', "<mark> <b>$1</b></mark>", $row->author_id);
                        $row->shanka = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->shanka);
                        $row->samadhan = preg_replace('/(' . $search . ')/i', "<mark> <b>$1</b></mark>", $row->samadhan);
                        $row->sub_id = preg_replace('/(' . $search . ')/i', "<span><mark><b> $1</b></mark><span/>", $row->sub_id);
                          return $row;
                             });

        //$sp->appends(['search' => $search]);

        return view('ft.shanka.search', compact('shanka','search'));

    }
}
