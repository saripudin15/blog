@extends('template_backend.home')
@section('sub-judul','Tambah User')

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

<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Type</label>
           <select name="tipe" class="form-control">
               <option value="" holder>Pilih tipe user</option>
               <option value="1" holder>Administrator</option>
               <option value="0" holder>Author</option>
           </select>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password">
        </div>
        <button class="btn btn-warning">Simpan</button>
    </div>
</form>
@endsection