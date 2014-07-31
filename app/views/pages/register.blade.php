@extends('layouts.master')

@section('content')
	<div class="col-md-4 col-md-offset-4 form-wrapper panel panel-primary">
	<div class="panel-heading  center">Please register:</div>
	<div class="panel-body">
	{{Form::open(['url' => 'users/store','role'=>'form' , 'name' => 'register', 'class'=>'form', 'novalidate' => '']) }}
	<div class="form-group">
		Username<input type="text" name="username" ng-model="newUsername" class="form-control" placeholder="johnsmith" required ng-minlength=5>
	    <em class="muted" ng-show="register.username.$dirty && register.username.$invalid">Minimum 5 characters</em>
		{{ $errors->first('username','<em class="muted" ng-hide="register.username.$dirty">:message</em>') }}
	</div>
	<div class="form-group">
		Email<input type="email" name="email" class="form-control" ng-model="newEmail" placeholder="johnsmith@something.com" required>
        <em class="muted" ng-show="register.email.$dirty && register.email.$invalid">Not valid email address</em>
		{{ $errors->first('email','<em class="muted" ng-hide="register.email.$dirty">:message</em>') }}
	</div>
	<div class="form-group">
		Password<input type="password" name="password" ng-model="newPassword" class="form-control" placeholder="*******" required ng-minlength=6>
        <em class="muted" ng-show="register.password.$dirty && register.password.$invalid">Required. Minimum 6 characters</em>
		{{ $errors->first('password','<em class="muted" ng-hide="register.password.$dirty">:message</em>') }}
	</div>
	<div class="form-group">
		Confirm Password<input type="password" name="password_confirmation" ng-model="passwordConfirm" class="form-control" ng-class="{'pass-mismatch':newPassword!=passwordConfirm}" placeholder="*******" required ng-minlength=6>
        <em class="muted" ng-show="register.password_confirmation.$dirty &&newPassword!=passwordConfirm">Passwords do not match</em>
		{{ $errors->first('password_confirmation','<em class="muted" ng-hide="register.password_confirmation.$dirty">:message</em>') }}
	</div>
	<div class="form-group">
    	Telephone<input type="text" name="telephone" ng-model="newTelephone" class="form-control" placeholder="0333444555" required ng-pattern="/^[0-9]+$/">
        <em class="muted" ng-show="register.telephone.$dirty && register.telephone.$invalid">Only numeric characters</em>
        {{ $errors->first('telephone','<em class="muted" ng-hide="register.telephone.$dirty">:message</em>') }}
    </div>
    <div class="form-group">
    	Address<input type="text" name="address" ng-model="newAddress" class="form-control" placeholder="Somestreet 99" required>
        <em class="muted" ng-show="register.address.$dirty && register.address.$invalid">Required</em>
        {{ $errors->first('address','<em class="muted" ng-hide="register.address.$dirty">:message</em>') }}
    </div>
    <div class="form-group">
    	City<input type="text" name="city"  ng-model="newCity" class="form-control" placeholder="Somecity" required>
        <em class="muted" ng-show="register.city.$dirty && register.city.$invalid">Required</em>
        {{ $errors->first('city','<em class="muted" ng-hide="register.city.$dirty">:message</em>') }}
    </div>
	<div class="form-group">
	{{ Form::submit('Register', array('class'=>'btn btn-primary submit'))}}
	</div>
	{{ Form::close() }}
	</div>
	</div>
@stop