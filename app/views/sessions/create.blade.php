@extends('layouts.master')

@section('content')
	<div class="container">

		<div class="form-wrapper col-md-4 col-md-offset-4 panel panel-primary">
		<div class="panel-heading  center">Welcome. Please sign in.</div>
		<div class="panel-body">
		{{ Form::open(['url' =>'sessions/store', 'class'=>'form']) }} 
		<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'johnsmith@something.com'])}}
		{{ $errors->first('email','<div class="error">:message</div>') }}
		</div>
		<div class="form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password',  ['class' => 'form-control', 'placeholder' => '*********'])}}
		{{ $errors->first('password','<div class="error">:message</div>') }}
		</div>
		<div class="form-group">
		{{ Form::submit('Login', array('class'=>'btn btn-primary submit'))}}
		</div>
		<div class="form-group">
			{{ link_to('password/remind','Forgot your password?')}}
		</div>
		{{ Form::close() }}
		</div>
		</div>

	</div>
@stop