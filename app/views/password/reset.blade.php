@extends('layouts.master')

@section('content')
	<div class="form-wrapper col-md-4 col-md-offset-4 panel panel-primary">
	<div class="panel-heading  center">Reset your password</div>
	<div class="panel-body">
		{{ Form::open() }}
		{{ Form::hidden('token', $token) }}
		<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'johnsmith@something.com'])}}
		{{ $errors->first('email','<div class="error">:message</div>') }}
		</div>
		<div class="form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', ['class' => 'form-control', 'placeholder' => '*********'])}}
		{{ $errors->first('password','<div class="error">:message</div>') }}
		</div>
		<div class="form-group">
		{{ Form::label('password_confirmation', 'Confirm Password') }}
		{{ Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' => '*********'])}}
		{{ $errors->first('password_confirmation','<div class="error">:message</div>') }}
		</div>
		<div class="form-group">
		{{ Form::submit('Reset', array('class'=>'btn btn-primary submit'))}}
		</div>
		{{ Form::close()}}
		@if( Session::has('error') )
			<p class="error">{{ Session::get('error') }}</p>
		@endif
	</div>
	</div>
	</div>
@stop