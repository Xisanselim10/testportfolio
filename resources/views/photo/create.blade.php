@extends('layouts/main')

@section('content')
	<div class="jumbotron">
		<div class="container text-center">
			<h1>Update Protfolio Gallery</h1>      
			<p>Update Protfolio Gallery And Upload Your Protfolio Image</p>
			<p>
				<a href="/" class="btn btn-primary btn-lg">Back To Gallery</a>
				<a href="/gallery/show/{{ $id }}" class="btn btn-primary btn-lg">Back To Protfolio</a>
			</p>
		</div>
	</div>
	
	<div class="container-fluid bg-3 text-center">
		<div class="row">
			<div class="col-sm-12">
				<div class="container">    
					<h2>Update Gallery Form Here</h2>
					{!! Form::open(array('action' => 'PhotoController@store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}
						<div class="form-group">
							{!! Form::label('title', 'Title', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::text('title', $value = null, $attributes = ['placeholder' => 'Portfolio Title', 'name' => 'title', 'required' => 'required', 'class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('description', 'Description', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::textarea('description', $value = null, $attributes = ['placeholder' => 'Portfolio Description', 'rows' => '10', 'cols' => '10', 'name' => 'description', 'required' => 'required', 'class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('location', 'Location', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::text('location', $value = null, $attributes = ['placeholder' => 'Portfolio Location', 'name' => 'location', 'required' => 'required', 'class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('image', 'Portfolio Imager', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::file('image', $attributes = ['class' => 'form-control']) !!}
							</div>
						</div>

						{!! Form::hidden('gallery_id', $value = $id ) !!}

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-1">
								{!! Form::submit('Submit', $attributes = ['class' => 'btn btn-primary']) !!}
							</div>
						</div>
					{!! Form::close() !!}			
				</div>
			</div>
		</div>
	</div>

	<br><br>
@endsection