<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker;

class UsersController extends Controller {

    /**
    * Responds to requests to GET /users
    */
    public function getIndex() {
		// create Faker instance
		$faker = Faker\Factory::create();
		
		// Generate user information
		$userName = $faker->name();
		$userStreet = $faker->streetAddress();
		$userCity = $faker->city();
		$userState = $faker->stateAbbr();
		$userZip = $faker->postcode();
		$userPhone = $faker->phoneNumber();
		
		// Send user information to View
        return view('users.index')
			->with('userName', $userName)
			->with('userStreet', $userStreet)
			->with('userCity', $userCity)
			->with('userState', $userState)
			->with('userZip', $userZip)
			->with('userPhone', $userPhone);
    }

    /**
    * Responds to requests to POST /users
    */
    public function postIndex(Request $request) {
		// create Faker instance
		$faker = Faker\Factory::create();
		
		// Get user options
		$phone = $request->input('phone');	// Should a phone number be displayed
		$address = $request->input('address');	// Should a full or partial address be displayed
		
		// Generate required information
		$userName = $faker->name();
		$userCity = $faker->city();
		$userState = $faker->stateAbbr();
		
		// Check for and generate optional information, else set deselected variables to null
		if ($address == 1) {
			$userStreet = $faker->streetAddress();
			$userZip = $faker->postcode();
		} else {
			$userStreet = null;
			$userZip = null;
		}
		if ($phone == 1) {
			$userPhone = $faker->phoneNumber();
		} else {
			$userPhone = null;
		}
		
		// Send user information to View
        return view('users.index')
			->with('userName', $userName)
			->with('userStreet', $userStreet)
			->with('userCity', $userCity)
			->with('userState', $userState)
			->with('userZip', $userZip)
			->with('userPhone', $userPhone);
    }
}