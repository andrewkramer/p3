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
		
		$userName = $faker->name();
		$userStreet = $faker->streetAddress();
		$userCity = $faker->city();
		$userState = $faker->stateAbbr();
		$userZip = $faker->postcode();
		$userPhone = $faker->phoneNumber();
		
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
		
		$phone = $request->input('phone');
		$address = $request->input('address');
		
		$userName = $faker->name();
		$userCity = $faker->city();
		$userState = $faker->stateAbbr();
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
		
        return view('users.index')
			->with('userName', $userName)
			->with('userStreet', $userStreet)
			->with('userCity', $userCity)
			->with('userState', $userState)
			->with('userZip', $userZip)
			->with('userPhone', $userPhone);
    }
}