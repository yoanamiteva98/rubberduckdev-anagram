<?php

//first solution I thought of, using arrays - simple and working but the longer the strings are the slower will the arrays be sorted
function isAnagram (String $firstWord, String $secondWord) 
{
	$firstWordArray = str_split($firstWord);
	$secondWordArray = str_split($secondWord);
	
	if (count($firstWordArray) == count($secondWordArray)) {
		array_multisort($firstWordArray);
		array_multisort($secondWordArray);
		
		return $firstWordArray === $secondWordArray ? true : false;
	} else {
		return false;
	}	
}

//second solution using strings, used an additional array like a hashmap, I believe it should work faster and not take extra memory
function isAnagramSecondV (String $firstWord, String $secondWord) 
{
	$countFirstWordLetters = [];
	
	if (strlen($firstWord) == strlen($secondWord)) {
		foreach (count_chars($firstWord, 1) as $key => $value) {
		   $countFirstWordLetters[chr($key)] = $value;
		}
		
		foreach ($countFirstWordLetters as $key => $value) {
			if(substr_count($secondWord, $key) != $value) {
				return false;
			}
		}
		return  true;
	} else {
		return false;
	}	
}

// the code below is not a part of the task but I used it to test the methods so I decided to leave it here as well
function testIsAnagram(Array $testInput)
{
	echo 'Testing with first method isAnagram()' . PHP_EOL;
	foreach ($testInput as $input) {
		echo $input[0] . ', ' . $input[1];
		echo isAnagram($input[0], $input[1]) ? ' is an anagram' . PHP_EOL : ' is not an anagram' . PHP_EOL;
	}
}

function testIsAnagramSecondV(Array $testInput)
{
	echo 'Testing with second method isAnagramSecondV()' . PHP_EOL;
	foreach ($testInput as $input) {
		echo $input[0] . ', ' . $input[1];
		echo isAnagramSecondV($input[0], $input[1]) ? ' is an anagram' . PHP_EOL : ' is not an anagram' . PHP_EOL;
	}
}

//testing the above methods with random string values
$testInput = [
	1 => ['hello', 'hlleo'],
	2 => ['test', 'tast'],
	3 => ['anagram', 'nagaram'],
	4 => ['haha', 'hoho'],
];
testIsAnagram($testInput);
testIsAnagramSecondV($testInput);
