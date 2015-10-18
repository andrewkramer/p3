@extends('layouts.master')

@section('header')
	Lorum Ipsum Generator
@stop

@section('main')
	<div class="genResult col-md-12">
		<h2>{{ $lipsum }}</h2>
	</div>
	<div class="col-md-offset-3 col-md-6">
		<form class="form-horizontal" method="POST">
			<input type='hidden' name='_token' value='{{ csrf_token() }}'>
			<div class="form-group">
				<label for="wordCount" class="col-md-1 control-label">Words: </label><small class="right">(Max: 1,000)</small>
				<input id="wordCount" class="form-control" type="number" name="length">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" >Generate Text</button>
			</div>
		</form>
		<h3>Lorum Ipsum</h3>
		<p>Random Lorum Ipsum text is commonly used as a placeholder in lieu of legitimate text during the layout phase of media projects.</p>
	</div>
@stop