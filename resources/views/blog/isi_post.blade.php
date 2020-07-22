@extends('template_blog.main')
@section('title', 'Post')

@section('content')

    @foreach ($data as $isi_post)
    <div id="post-header" class="page-header">
        <div class="page-header-bg" style="background-image: url( {{ asset($isi_post->gambar) }} ); background-repeat: no-repeat; background-size: cover; background-position: center" ></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-category">
                        <a href="category.html">{{ $isi_post->category->name }}</a>
                    </div>
                    <h1> {{ $isi_post->judul }} </h1>
                    <ul class="post-meta">
                        <li><a href="author.html">{{ $isi_post->users->name }}</a></li>
                        <li>{{ $isi_post->created_at }}</li>
                        {{-- <li><i class="fa fa-comments"></i> 3</li> --}}
                        {{-- <li><i class="fa fa-eye"></i> 807</li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section-row">
        {!! $isi_post->content !!}
    </div>
    @endforeach

@endsection