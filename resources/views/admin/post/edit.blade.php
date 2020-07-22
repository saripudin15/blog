@extends('template_backend.home')
@section('sub-judul','Edit Post')

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

<form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="card-body">
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
        </div>
        <div class="form-group">
            <label>Kategori</label>
           <select class="form-control" name="category_id" id="">
               <option value="" holder>Pilih Kategori</option>
               @foreach ($category as $result)
                    <option value="{{ $result->id }}"
                        @if ($post->category_id == $result->id)
                            selected
                        @endif
                        >
                        {{ $result->name }}
                    </option>
               @endforeach
                
           </select>
        </div>
        <div class="form-group">
            <label for="">Pilih Tags</label>
            <select name="tags[]" class="form-control select2" multiple="">
                @foreach ($tags as $tag)
                     <option value="{{ $tag->id }}"
                        @foreach ($post->tags as $value)
                            @if ($tag->id == $value->id)
                                selected
                            @endif
                        @endforeach
                        >
                        {{ $tag->name }}
                      </option>
                @endforeach
                
            </select>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"> {{ $post->content }} </textarea>
        </div>
        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" name="gambar" id="" class="form-control">
        </div>
        <button class="btn btn-warning">Simpan</button>
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection