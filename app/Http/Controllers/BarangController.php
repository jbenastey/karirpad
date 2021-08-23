<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'barang' => Barang::all()
        ];

        return view('barang.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('foto')){
            $path = $request->file('foto')->store('uploads/image/barang');

            $simpan = Barang::create([
                'nama' => $request->input('nama'),
                'kategori' => $request->input('kategori'),
                'harga' => $request->input('harga'),
                'foto' => $path,
                'diskon' => $this->diskon($request->input('harga')),
            ]);
            if ($simpan) {
                return redirect('barang');
            } else {
                return redirect('barang');
            }
        } else {
            return redirect('barang');
        }
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
        //
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

    private function diskon($input)
    {
        if ($input >= 40000){
            return $input*0.1;
        } elseif ($input >= 20000 && $input < 40000) {
            return $input*0.05;
        }
        return 0;
    }
}
