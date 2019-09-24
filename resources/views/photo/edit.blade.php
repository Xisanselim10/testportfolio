@extends('layouts/main')

@section('content')
	<div class="jumbotron">
		<div class="container text-center">
			<h1>Edit Protfolio Gallery</h1>      
			<p>Edit Protfolio Gallery And Upload Your Protfolio Image</p>
			<p>
				<a href="/" class="btn btn-primary btn-lg">Back To Gallery</a>
				<a href="/photo/details/{{ $photo->id }}" class="btn btn-primary btn-lg">Back To Protfolio Details</a>
			</p>
		</div>
	</div>
	
	<div class="container-fluid bg-3 text-center">
		<div class="row">
			<div class="col-sm-12">
				<div class="container">    
					<h2>Edit Photo Form Here</h2>
					{!! Form::open(array('action' => 'PhotoController@update', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}
						<div class="form-group">
							{!! Form::label('title', 'Title', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::text('title', $value = $photo->title, $attributes = ['name' => 'title', 'required' => 'required', 'class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('description', 'Description', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::textarea('description', $value = $photo->description, $attributes = ['rows' => '10', 'cols' => '10', 'name' => 'description', 'required' => 'required', 'class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('location', 'Location', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::text('location', $value = $photo->location, $attributes = ['name' => 'location', 'required' => 'required', 'class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('image', 'Portfolio Imager', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-5">
								{!! Form::file('image', $attributes = ['class' => 'form-control']) !!}
							</div>
							<div class="col-sm-5">
								<img src="/images/{{ $photo->image }}" class="pre-img">
							</div>
						</div>

						{!! Form::hidden('id', $value = $photo->id ) !!}
						{!! Form::hidden('gallery_id', $value = $photo->gallery_id ) !!}
						{!! Form::hidden('previous_image', $value = $photo->image ) !!}

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-1">
								{!! Form::submit('Update', $attributes = ['class' => 'btn btn-primary']) !!}
							</div>
						</div>
					{!! Form::close() !!}			
				</div>
			</div>
		</div>
	</div>

	<br><br>
@endsection