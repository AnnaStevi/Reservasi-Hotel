<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = Kamar::select('id','nama_kamar','jum_kamar', 'harga_kamar')
      ->when($search, function($query, $search){
        return $query->where('nama_kamar', 'like', "%{$search}%")
        ->orWhere('harga_kamar', 'like', "%{$search}%");
    })
        ->paginate(50);

        return view('kamar.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kamar' => 'required|min:3',
            'foto_kamar' => 'required|image|mimes:png,jpg,jpeg',
            'jum_kamar' => 'required',
            'harga_kamar' => 'required',
            'deskripsi_kamar' => 'required|min:10'
        ]);

        $ext = $request->foto_kamar->getClientOriginalExtension();
        $filename = rand(9,999).'_'.time().'.'.$ext;
        $request->foto_kamar->move('images/kamar', $filename);

        Kamar::create([
            'nama_kamar' => $request->nama_kamar,
            'foto_kamar' => $filename,
            'jum_kamar' => $request->jum_kamar,
            'harga_kamar' => $request->harga_kamar,
            'deskripsi_kamar' => $request->deskripsi_kamar
        ]);

        return redirect()->route('kamar.index')->with('status','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        return view('kamar.edit',['row'=>$kamar]);
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
