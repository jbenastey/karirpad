@extends('custom-layouts.app')

@section('header','Update Data Barang')

@section('content')
    {{-- dynamic content--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('barang.update',$barang->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="nama" class="col-2">Nama Barang</label>
                            <div class="col-9">
                                <input name="nama" id="nama" value="{{$barang->nama}}" class="form-control" type="text" required placeholder="Isikan nama barang"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-2">Kategori</label>
                            <div class="col-9">
                                <select name="kategori" required class="form-control" id="kategori">
                                    <option value="Retail" @if($barang->kategori == "Retail") selected @endif>Retail</option>
                                    <option value="Wholesale" @if($barang->kategori == "Wholesale") selected @endif>Wholesale</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-2">Harga</label>
                            <div class="col-9">
                                <input name="harga" value="{{$barang->harga}}" id="harga" class="form-control" type="number" required placeholder="Isikan harga"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-2">Foto</label>
                            <div class="col-9">
                                <input name="foto" id="foto" type="file" class="dropify"
                                       data-default-file="{{asset($barang->foto)}}"
                                       data-show-remove="false"
                                       data-allowed-file-extensions="jpg jpeg png">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2"></div>
                            <div class="col-2 d-flex justify-content-start">
                                <div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <a href="{{route('barang.index')}}" class="btn btn-light">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
