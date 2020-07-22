@extends('template_backend.home')
@section('sub-judul','Edit User')

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

<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="card-body">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
        </div>
        <div class="form-group">
            <label>Type</label>
           <select name="tipe" class="form-control" name="tipe">
               <option value="" holder>Pilih tipe user</option>
               <option value="1" holder @if ($user->tipe == 1)
                  selected 
               @endif>Administrator</option>
               <option value="0" holder @if ($user->tipe == 0)
                   selected
               @endif>Author</option>
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