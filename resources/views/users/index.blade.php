@extends('layouts.master')

<?php
	// create Faker instance
	$faker = Faker\Factory::create();
?>

@section('header')
	Random User Generator
@stop

@section('main')
	<div class="col-md-12">
		<div class="genResult">
			<h2>
				<?php
					echo $faker->name() . "<br>";
					echo $faker->streetAddress() . "<br>";
					echo $faker->city() . ", " . $faker->stateAbbr() . " " . $faker->postcode() . "<br>";
					echo $faker->phoneNumber() . "<br>";
				?>
			</h2>
		</div>
		<h3>Random Users</h3>
		<p>Use randomly generated user information to fill databases for testing.</p>
	</div>
@stop