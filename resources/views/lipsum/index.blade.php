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
				<label for="wordCount" class="col-md-1 control-label">Sentences: </label><small class="right">(Max: 12)</small>
				<input id="wordCount" class="form-control" type="number" name="length">
			</div>
			<!--
			<div class="form-group">
				<label for="separator" class="col-md-1 control-label">Separator: </label>
				<select id="separator" class="form-control" name="separator">
					<option value=" ">[space]</option>
					<option value=",">,</option>
					<option value=".">.</option>
					<option value="-">-</option>
					<option value="_">_</option>
					<option value="">[none]</option>
				</select>
			</div>
			<div class="form-group">
				<label for="symbols" class="col-md-1 control-label">Symbols: </label><small class="right">(Max: 12)</small>
				<input id="symbols" class="form-control" type="number" name="symbols">
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label">Symbol Placement:</label>
				<div class="radio-inline">
					<label for="symbolLocationRandom0" class="col-md-6 control-label">
						<input id="symbolLocationRandom0" type="radio" name="symbolLocationRandom" value="0" checked>
						End of Password
					</label>
					<label for="symbolLocationRandom1" class="col-md-6 control-label">
						<input id="symbolLocationRandom1" type="radio" name="symbolLocationRandom" value="1">
						Random
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="numbers" class="col-md-1 control-label">Numbers: </label><small class="right">(Max: 12)</small>
				<input id="numbers" class="form-control" type="number" name="numbers">
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label">Number Placement:</label>
				<div class="radio-inline">
					<label for="numberLocationRandom0" class="col-md-6 control-label">
						<input id="numberLocationRandom0" type="radio" name="numberLocationRandom" value="0" checked>
						End of Password
					</label>
					<label for="numberLocationRandom1" class="col-md-6 control-label">
						<input id="numberLocationRandom1" type="radio" name="numberLocationRandom" value="1">
						Random
					</label>
				</div>
			</div>
			-->
			<div class="form-group">
				<button class="btn btn-primary" type="submit" >Generate Text</button>
			</div>
		</form>
		<h3>Lorum Ipsum</h3>
		<p>Random Lorum Ipsum text is commonly used as a placeholder in lieu of legitimate text during the layout phase of media projects.</p>
	</div>
@stop