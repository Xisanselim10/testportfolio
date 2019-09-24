@extends('layouts/main')

@section('content')
	<div class="jumbotron">
		<div class="container text-center">
			<h1>Create Protfolio Gallery</h1>      
			<p>Create Protfolio Gallery And Upload Your Protfolio Image</p>
		</div>
	</div>
	
	<div class="container-fluid bg-3 text-center">
		<div class="row">
			<div class="col-sm-12">
				<div class="container">    
					<h2>Create Gallery Form Here</h2>
					{!! Form::open(array('action' => 'GalleryController@store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal')) !!}
						<div class="form-group">
							{!! Form::label('name', 'Name', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::text('name', $value = null, $attributes = ['placeholder' => 'Gallery Name', 'name' => 'name', 'required' => 'required', 'class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('description', 'Description', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::text('description', $value = null, $attributes = ['placeholder' => 'Gallery Description', 'name' => 'description', 'required' => 'required', 'class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('cover_image', 'Cover Imager', $attributes = ['class' => 'control-label col-sm-2']) !!}
							<div class="col-sm-10">
								{!! Form::file('cover_image', $attributes = ['class' => 'form-control']) !!}
							</div>
						</div>

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