@extends('layouts.master')

@section('header')
	Random User Generator
@stop

@section('main')
	<div class="genResult col-md-offset-3 col-md-6">
		<h2>
			{{ $userName }}<br>
			@if(isset($userStreet))
				{{ $userStreet }}<br>
			@endif
			{{ $userCity }}, {{ $userState }}
			@if(isset($userStreet))
				, {{ $userZip }}
			@endif
			<br>
			{{ $userPhone }}<br>
		</h2>
	</div>
	<div class="col-md-offset-3 col-md-6">
		<form class="form" method="POST">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<div class="form-group">
				<label class="control-label">Address:</label>
				<div class="radio">
					<label for="Address1" class="col-md-12 control-label">
						<input id="Address1" type="radio" name="address" value="1" checked>
						Full
					</label>
					<label for="Address0" class="col-md-12 control-label">
						<input id="Address0" type="radio" name="address" value="0">
						City/State Only
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">Phone Number:</label>
				<div class="radio">
					<label for="Phone1" class="col-md-12 control-label">
						<input id="Phone1" type="radio" name="phone" value="1" checked>
						Yes
					</label>
					<label for="Phone0" class="col-md-12 control-label">
						<input id="Phone0" type="radio" name="phone" value="0">
						No
					</label>
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" >Generate Text</button>
			</div>
		</form>
		<h3>Random Users</h3>
		<p>Use randomly generated user information to fill databases for testing.</p>
	</div>
@stop