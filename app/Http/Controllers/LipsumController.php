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
		// Initiate Faker instance
		$faker = Faker\Factory::create();
		
		// Generate a default Lipsum paragraph
		$lipsum = $faker->paragraph();
		
		// Send paragraph to View
        return view('lipsum.index')->with('lipsum', $lipsum);
    }

    /**
    * Responds to requests to POST /lipsum
    */
    public function postIndex(Request $request) {
		
		// Validate the request data
		$this->validate($request, [
			'length' => 'required|min:1|max:1000|numeric',
		]);
		
		// Initiate Faker instance
		$faker = Faker\Factory::create();
		
		// Get requested word count
		$length = $request->input('length');
		
		// Initiate variables
		$lipsum = "";	// paragraph string
		$upper = true;	// Beginning of sentence
		$sentenceBreak = mt_rand(2,25);		// Sentence length
		$paragraphBreak = mt_rand(20,50);	// Paragraph length
		$lastParagraphBreak = $length - mt_rand(20,50);	// Ensure random paragraph breaks don't leave an orphan paragraph
		
		// Generate paragraph one word at a time
		for ($i = 1; $i <= $length; $i++) {
				// Generate word, capitalize if it is the beginning of a sentence
				$vocabulum = $faker->word();
				if ($upper) {
					$vocabulum = ucfirst($vocabulum);
					$upper = false;
				}
				
				// Add the word to the text
				$lipsum = $lipsum . $vocabulum;
				
				// Check for and add sentence and paragraph breaks, else add a space between words
				if ($i == $length || $i == $sentenceBreak) {
					$lipsum = $lipsum . ". ";
					$upper = true;
					$sentenceBreak = $sentenceBreak + mt_rand(2,25);
					if ($i >= $paragraphBreak && $i <= $lastParagraphBreak) {
						$lipsum = $lipsum . "\n\n";
						$paragraphBreak = $paragraphBreak + mt_rand(20,50);
					}
				} else {
					$lipsum = $lipsum . " ";
				}
		}
		
		// Send the text to View
        return view('lipsum.index')->with('lipsum', $lipsum);
    }
}