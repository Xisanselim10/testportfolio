@extends('layouts/main')

@section('content')
	<div class="jumbotron">
		<div class="container text-center">
			<h1>Protfolio Gallery</h1>      
			<p>Create Protfolio Gallery And Upload Your Protfolio Image</p>
		</div>
	</div>
	
	<div class="container-fluid bg-3">
		<div class="row">
			@foreach ($galleries as $gallery)
				<div class="col-sm-4">
					<a href="/gallery/show/{{ $gallery->id }}">
						<img src="/images/{{ $gallery->cover_image }}" class="img-responsive img-col" alt="Image">
					</a>
					<h3><b>{{ $gallery->name }}</b></h3>
					<p>{{ $gallery->description }}</p>
				</div>
			@endforeach
		</div>
	</div>

	<br><br>
@endsection