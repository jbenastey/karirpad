@php($role = \Illuminate\Support\Facades\Auth::user()->role)

@extends('custom-layouts.app')
@section('header')
    Data Barang

    @if($role == 'superuser')
    <a href="{{ route('barang.create') }}">
        <i class="fas fa-plus-circle"></i>
    </a>
    @endif
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table " id="datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            @if($role == 'superuser')
                                <th>Aksi</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($barang as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a class="image-popup-no-margins" href="{{asset($value->foto)}}">
                                        <img class="img-fluid" alt="" src="{{asset($value->foto)}}" width="75">
                                    </a>
                                </td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->kategori}}</td>
                                <td>{{$value->harga}}</td>
                                <td>{{$value->diskon}}</td>
                                @if($role == 'superuser')
                                <td>
                                    <form action="{{ route('barang.destroy',$value->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('barang.edit',$value->id) }}"  class="btn btn-sm btn-success" >
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data ?')">
                                            <i class="fas fa-trash-alt text-white"></i>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
