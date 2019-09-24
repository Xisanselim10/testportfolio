@extends('layouts/main')

@section('content')
	<div class="jumbotron">
		<div class="container text-center">
			<h1>{{ $gallery->name }}</h1>      
			<p>{{ $gallery->description }}</p>
			<p>
				<a href="/" class="btn btn-primary btn-lg">Back To Gallery</a>
				@if (Auth::check())
					<a href="/photo/create/{{ $gallery->id }}" class="btn btn-primary btn-lg">Update Protfolio</a>
				@endif
			</p>
		</div>
	</div>
	
	<div class="container-fluid bg-3">
		<div class="row">
			@foreach ($photos as $photo)
				<div class="col-sm-4">
					<a href="/photo/details/{{ $photo->id }}">
						<img src="/images/{{ $photo->image }}" class="img-responsive" style="width: 350px; height: 200px; border: 1px solid #ddd; padding: 5px;" alt="Image">
					</a>
					<h3><b>{{ $photo->title }}</b></h3>
					<p>{{ $photo->description }}</p>
				</div>
			@endforeach
		</div>
	</div>

	<br><br>
@endsection