@extends('layouts.master')

<?php
	// create Faker instance
	$faker = Faker\Factory::create();
?>

@section('header')
	Lorum Ipsum Generator
@stop

@section('main')
	<div class="col-md-12">
		<div class="genResult">
			<h2>
				<?php
					echo $faker->text();
				?>
			</h2>
		</div>
		<h3>Lorum Ipsum</h3>
		<p>Random Lorum Ipsum text is commonly used as a placeholder in lieu of legitimate text during the layout phase of media projects.</p>
	</div>
@stop