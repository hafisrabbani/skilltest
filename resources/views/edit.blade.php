@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        @if (session('success'))
                            <div class="alert alert-success mt-3" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3" style="width: auto"><i class="fas fa-arrow-left"></i></a>
                        <form action="{{ route('edit') }}" class="my-3" method="POST">
                            @csrf
                            <h5 style="border-bottom: 1px solid #999" class="text-center">Edit Barang</h5>
                            @foreach ($data as $item)
                            <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="form-group">
                                    <label for="name">Nama Barang</label>
                                    <input type="text" name="name" id="name" value="{{ $item->nama_barang }}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stok">Nama Barang</label>
                                    <input type="number" name="stok" id="stok" value="{{ $item->stok }}" class="form-control @error('stok') is-invalid @enderror">
                                    @error('stok')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                        <option disabled>-- Pilih Status --</option>
                                        <option value="1" {{ ($item->status == '1') ? 'selected' : '' }}>Baik</option>
                                        <option value="2" {{ ($item->status == '2') ? 'selected' : '' }}>Rusak</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
