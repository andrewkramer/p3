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
		
		$lipsum = "";
		$upper = true;
		$sentenceBreak = mt_rand(2,25);
		$paragraphBreak = mt_rand(20,50);
		$lastParagraphBreak = $length - mt_rand(20,50);
		
		for ($i = 1; $i <= $length; $i++) {
				$vocabulum = $faker->word();
				if ($upper) {
					$vocabulum = ucfirst($vocabulum);
					$upper = false;
				}
				
				$lipsum = $lipsum . $vocabulum;
				
				if ($i == $length || $i == $sentenceBreak) {
					$lipsum = $lipsum . ". ";
					$upper = true;
					$sentenceBreak = $sentenceBreak + mt_rand(2,25);
					if ($i >= $paragraphBreak && $i <= $lastParagraphBreak) {
						$lipsum = $lipsum . "<br><br>";
						$paragraphBreak = $paragraphBreak + mt_rand(20,50);
					}
				} else {
					$lipsum = $lipsum . " ";
				}
		}
		
        return view('lipsum.index')->with('lipsum', $lipsum);
    }
}