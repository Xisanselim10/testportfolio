@extends('layouts/main')

@section('content')
	<div class="jumbotron">
		<div class="container text-center">
			<h1 style="color: green;">{{ $photo->title }}</h1>
			<h2 style="color: red;">Location: {{ $photo->location }}</h2> 
			<p style="text-align: justify;">{{ $photo->description }}</p>
			<p>
				<a href="/" class="btn btn-default btn-lg">Back To Gallery</a>

				<a href="/gallery/show/{{ $photo->gallery_id }}" class="btn btn-primary btn-lg">Back To Protfolio</a>

				@if (Auth::check())
					<a href="/photo/edit/{{ $photo->id }}" class="btn btn-success btn-lg">Edit Protfolio</a>

					<a href="/photo/destroy/{{ $photo->id }}/{{ $photo->gallery_id }}" class="btn btn-danger btn-lg" onclick="return confirm('Are You Sure You Wnat To Delete This Item?');">Delete Protfolio</a>
				@endif
			</p>
		</div>
	</div>
	
	<div class="container-fluid bg-3">
		<div class="row">
			<div class="col-sm-12">
				<img src="/images/{{ $photo->image }}" class="img-center" alt="Image">
			</div>
		</div>
	</div>

	<br><br>
@endsection