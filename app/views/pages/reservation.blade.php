@extends('layouts.master')

@section('content')
	<div class="container" ng-controller="tableController">
	<h3>Reservations</h3>
	@if(Auth::guest())
	<em class="mutted">You must be logged in to make reservation</em>
  @else
  <em class="mutted">Select date and time then click search to see what's available</em>
	@endif
	
	<form class="row search-box form-inline" ng-submit="searchReservations(dt.getDate(),dt.getMonth()+1,dt.getFullYear(),time)">
        <div class="col-md-3">
            <p class="input-group">
              <input type="text" class="form-control" datepicker-popup="@{{format}}" ng-model="dt" is-open="opened" min-date="minDate" max-date="'2015-06-22'" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
              <span class="input-group-btn">
                <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
              </span>
            </p>
        </div>
        <div class="col-md-2">       			
			<p class="input-group">
          <select class="form-control inline" ng-model="time">
        		<option ng-repeat="hour in hours" ng-selected="hour==currentTime">@{{hour}}</option>
        	</select>
              <span class="input-group-btn">
                <button type="button" class="btn btn-default" ng-click=""><i class="fa fa-clock-o"></i></button>
              </span>
            </p>
        </div>
        <div class="">
        	<input type="submit" class="btn btn-success" value="Search" />
        </div>
    </form>
	<div class="tables-container row">
		<div class="col-md-2 restaurant-table " ng-repeat="table in tables">
			<h3>Table No. @{{table.number}}</h3>
			<p>Number of seats: @{{table.seats}}</p>
			<button class="btn btn-sm btn-danger" ng-show="reservedTables.indexOf(table.id)!=-1" style="cursor:auto;">Reserved</button>
			<a class="btn btn-sm btn-success" ng-show="reservedTables.indexOf(table.id)==-1" 
          ng-click="makeReservation(table.id, dt.getDate(), dt.getMonth()+1, dt.getFullYear(), time)">Make reservation</a>
		</div>
	</div>
</div>
@stop