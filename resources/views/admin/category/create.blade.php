@extends('template_backend.home')
@section('sub-judul','Tambah Kategori')

@section('content')

@if (count($errors)>0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
      </div>
       
    @endforeach   
@endif

@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session('success') }}
    </div>
@endif

<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button class="btn btn-warning">Simpan</button>
    </div>
</form>
@endsection