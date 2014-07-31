@extends('layouts.master')
@section('content')
	<div class="container" ng-controller="adminController">
	<h1 class="breathe">Dashboard</h1>
		<tabset>
			@if(checkRole('admin'))
			<tab ng-controller="usersController">
				<tab-heading><i class="fa fa-user"></i> Users</tab-heading>
					@include('partials.userstable')	
			</tab>
			@endif
			<tab ng-controller="tableController">
				<tab-heading><i class="fa fa-coffee"></i> Tables</tab-heading>
				@include('partials.tablestable')
			</tab>
			<tab ng-controller="reservationsController">
				<tab-heading><i class="fa fa-check"></i> Reservations</tab-heading>
				@include('partials.reservationstable')
			</tab>
			<tab><tab-heading><i class="fa fa-spoon"></i> Orders</tab-heading></tab>
		</tabset>
	</div>
@stop