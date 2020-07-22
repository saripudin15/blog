@extends('template_backend.home')
@section('sub-judul','Tambah Tag')

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

<form action="{{ route('tag.store') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Nama Tag</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button class="btn btn-warning">Simpan</button>
    </div>
</form>
@endsection