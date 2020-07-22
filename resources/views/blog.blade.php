@extends('template_blog.main')
@section('title', 'Post')

@section('content')

		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Recent posts</h2>
				</div>
			</div>
			@foreach ($data as $post_terbaru)
			<!-- post -->
			<div class="col-md-6">
				<div class="post">
					<a class="post-img" href="{{ route('blog.isi', $post_terbaru->slug) }}"><img src="{{ $post_terbaru->gambar }}" alt="" style="height: 200px;"></a>
					<div class="post-body">
						<div class="post-category">
							<a href="#">{{ $post_terbaru->category->name }}</a>
						</div>
						<h3 class="post-title"><a href="#">{{ $post_terbaru->judul }}</a></h3>
						<ul class="post-meta">
							<li><a href="#">{{ $post_terbaru->users->name }}</a></li>
							<li>{{ $post_terbaru->created_at->diffForHumans() }}</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /post -->
			@endforeach
		</div>
		<!-- /row -->
@endsection