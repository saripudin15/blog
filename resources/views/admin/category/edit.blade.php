@extends('template_backend.home')
@section('sub-judul','Edit Kategori')

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

<form action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf
    @method('patch')
    <div class="card-body">
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
        </div>
        <button class="btn btn-warning">Update</button>
    </div>
</form>
@endsection