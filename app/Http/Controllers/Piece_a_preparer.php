<?php

namespace App\Http\Controllers;

use App\Models\Ao;
use App\Models\Fichier;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Piece_a_preparer extends Controller
{
    /*.*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ao $ao, Request $request)
    {
        $pieces_a_preparer = Piece_a_preparer::where('ao_id', $ao->id)->latest()->get();

        if ($request->ajax()) {
            $data = Piece_a_preparer::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPiece">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePiece">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.aos.preparation_reponses.administrative.pieces_a_preparer',compact('$pieces_a_preparer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Piece_a_preparer::updateOrCreate(['id' => $request->id],
            ['ao_id' => $request->ao_id, 'partie_id' => $request->partie_id]);

        return response()->json(['success'=>'Book saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $piece_a_preparer = Piece_a_preparer::find($id);
        return response()->json($piece_a_preparer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
