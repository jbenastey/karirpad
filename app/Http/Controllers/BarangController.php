<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
        if ($this->role() == 'superuser'){
            return view('barang.create');
        } else {
            Alert::warning('Perhatian', 'Hanya superuser yang bisa mengisi');
            return redirect('barang');
        }
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
                Alert::success('Berhasil', 'Data berhasil disimpan');
            } else {
                Alert::error('Gagal', 'Data gagal disimpan');
            }
            return redirect('barang');
        } else {
            Alert::error('Gagal', 'Data gagal disimpan');
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
        if ($this->role() == 'superuser') {
            $data = [
                'barang' => Barang::find($id)
            ];
            return view('barang.update', $data);
        } else {
            Alert::warning('Perhatian', 'Hanya superuser yang bisa mengisi');
            return redirect('barang');
        }
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
        $updateData = [
            'nama' => $request->input('nama'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'diskon' => $this->diskon($request->input('harga')),
        ];
        if ($request->hasFile('foto')){
            $path = $request->file('foto')->store('uploads/image/barang');
            $updateData['foto'] = $path;
            $barang = Barang::find($id);
            Storage::delete($barang->foto);
        }
        $update = Barang::where('id',$id)
            ->update($updateData);
        if ($update) {
            Alert::success('Berhasil', 'Data berhasil diupdate');
        } else {
            Alert::error('Gagal', 'Data gagal diupdate');
        }
        return redirect('barang');
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
        $barang = Barang::findOrFail($id);
        Storage::delete($barang->foto);
        $barang->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');

        return redirect('barang');
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

    private function role(){
        return Auth::user()->role;
    }
}
