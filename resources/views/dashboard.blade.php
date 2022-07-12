@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row justify-content-center">
                    <a href="{{ route('create') }}" class="btn btn-primary my-4 mx-4" style="width: auto"><i class="fas fa-plus"> Tambah Barang</i></a>
                    <div class="col-md-10">
                        <table class="table table-bordered text-center">
                            @if (session('success'))
                                <div class="alert alert-success mt-3" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>{!! ($item->status == 1) ? '<span class="text-success">Baik</span>' : '<span class="text-danger">Rusak</span>' !!}</td>
                                        <td>
                                            <div class="row"></div>
                                            <form action="{{ route('delete') }}" method="POST" id="{{ $item->id }}">

                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                @csrf
                                                <a href="{{ route('edit',$item->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                                <button class="btn btn-danger" type="button" onclick="deleteRow({{ $item->id }})"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function deleteRow(id)
        {
        swal({
            title: 'Yakin?',
            text: 'Apakah anda yakin ingin menghapus data ini?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete)=>{
            if(willDelete){
            $('#'+id).submit();
            }
        });
        }
    </script>
@endpush
