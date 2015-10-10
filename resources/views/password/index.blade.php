@extends('layouts.master')

@section('head')
<?php
	// Constraints
	$defaultWordCount = 4;
	$maxWordCount = 12;
	
	$possibleSeparators = array("", " ", ",", ".", "-", "_");
	$defaultSeparator = " ";
	
	$defaultSymbols = 0;
	$maxSymbols = 12;
	$defaultSymbolLocationRandom = true;
	
	$defaultNumbers = 0;
	$maxNumbers = 12;
	$defaultNumberLocationRandom = true;
	
	
	//Validate User Submitted Variables
	
	// Assume that if the first variable is submitted, then all are submited.
	// If the user violates this assumption by modifying the URL, the only ramification
	// if that notifications will be silently thrown.
	if (isset($_GET["wordCount"])) { 
		// If a given variable is not submitted or is an illegal value, resort to default value
		if ($_GET["wordCount"] > 1 && $_GET["wordCount"] <= $maxWordCount) {
			$wordCount = $_GET["wordCount"];
		} else {
			$wordCount = $defaultWordCount;
		}
		
		if (in_array($_GET["separator"], $possibleSeparators)) {
			$separator = $_GET["separator"];
		} else {
			$separator = $defaultSeparator;
		}
		
		if ($_GET["symbols"] > 0 && $_GET["symbols"] <= $maxSymbols) {
			$symbols = $_GET["symbols"];
		} else {
			$symbols = $defaultSymbols;
		}
		
		if ($_GET["symbolLocationRandom"] == 0 || $_GET["symbolLocationRandom"] == 1) {
			$symbolLocationRandom = $_GET["symbolLocationRandom"];
		} else {
			$symbolLocationRandom = $defaultSymbolLocationRandom;
		}
		
		if ($_GET["numbers"] > 0 && $_GET["numbers"] <= $maxNumbers) {
			$numbers = $_GET["numbers"];
		} else {
			$numbers = $defaultNumbers;
		}
		
		if ($_GET["numberLocationRandom"] == 0 || $_GET["numberLocationRandom"] == 1) {
			$numberLocationRandom = $_GET["numberLocationRandom"];
		} else {
			$numberLocationRandom = $defaultNumberLocationRandom;
		}
	} else { // If the variables have not been submitted, set all values to default.
		$wordCount = $defaultWordCount;
		$separator = $defaultSeparator;
		$symbols = $defaultSymbols;
		$symbolLocationRandom = $defaultSymbolLocationRandom;
		$numbers = $defaultNumbers;
		$numberLocationRandom = $defaultNumberLocationRandom;
	}
	
	//Generate Word List
	$wordList = file("data/words.txt");	// reads all words into an array; adds trailing space
	$wordListLength = count($wordList);
	
	//Generate Password
	$password = "";
	$addedSymbols = 0;
	$addedNumbers = 0;
	
	// For each required word in the password
	for ($i = 0; $i < $wordCount; $i++) {
		
		// Get a random word location from the list
		$index = rand(0, $wordListLength - 1);
		
		// Append the new word to the word list, removing the trailing space
		$password = $password . rtrim($wordList[$index]);
		
		// Randomly append numbers and/or symbols to the end of the word if 
		// the user requested random placement of these characters
		if ($symbolLocationRandom) {
			while (rand(0,1) == 1 && $addedSymbols < $symbols) {
				$password = $password . chr(rand(33,47));
				$addedSymbols++;
			}
		}
		if ($numberLocationRandom) {
			while (rand(0,1) == 1 && $addedNumbers < $numbers) {
				$password = $password . rand(0,9);
				$addedNumbers++;
			}
		}
			
		// Append separator to all but the last word
		// else add all remaining numbers and symbols to the end of the word
		if ($i < $wordCount - 1) {
			$password = $password . $separator;
		} else {
			for (; $addedSymbols < $symbols; $addedSymbols++) {
				$password = $password . chr(rand(33,47));
			}
			for (; $addedNumbers < $numbers; $addedNumbers++) {
				$password = $password . rand(0,9);
			}
		}
	}
	
	
?>
@stop

@section('header')
	XKDC Password Generator
@stop

@section('main')
	<div class="password col-md-12">
		<h2><?= $password ?></h2>
		<small>Refresh the page to generate another.</small>
	</div>
	<div class="col-md-offset-3 col-md-6">
		<form class="form-horizontal" method="get">
			<div class="form-group">
				<label for="wordCount" class="col-md-1 control-label">Words: </label><small class="right">(Max: 12)</small>
				<input id="wordCount" class="form-control" type="number" name="wordCount">
			</div>
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
			<div class="form-group">
				<button class="btn btn-primary" type="submit" >Create Password</button>
			</div>
		</form>
		<h3>Background</h3>
		<p> Wecome to the xkcd password generator! Standard passwords can be difficult to remember and are not as secure as most people think. However, passwords in the xkcd style use natural words to make it easy to remember passwords much longer than would be possible with standard passwords. The increased length allows for passwords that are significantly more secure. Furthermore, you can optionally add symbols and numbers to make the password even more secure.</p>
	</div>
@stop