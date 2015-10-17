<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Faker;

class LipsumController extends Controller {

    /**
    * Responds to requests to GET /lipsum
    */
    public function getIndex() {
		$faker = Faker\Factory::create();
		
		$lipsum = $faker->paragraph();
		
        return view('lipsum.index')->with('lipsum', $lipsum);
    }

    /**
    * Responds to requests to POST /lipsum
    */
    public function postIndex(Request $request) {
		
		$faker = Faker\Factory::create();
		
		$length = $request->input('length');
		
		$lipsum = $faker->paragraph($length);
		
        return view('lipsum.index')->with('lipsum', $lipsum);
    }
}