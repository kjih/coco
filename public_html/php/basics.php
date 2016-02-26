<?php

	/* variables */
	$name = "Kevin";
	$a = "name";

	echo $$a . "<br />";		/* == echo $name */

	/* if */
	$number = 1;
	$otherNumber = 2;
	$thirdNumber = 2;

	if ($thirdNumber == $otherNumber OR $number == $otherNumber) {
		echo "True<br />";
	}	else {
		echo "False";
	}

	/* for */
	for ($i = 1; $i <= 10; $i++) {
		echo $i."<br />";
	}

	/* foreach */
	$array = array("cat", "dog", "turtle", "kangaroo");

	foreach ($array as $key => $value) {
		echo "Key: $key Value: $value<br />";
	}

	/* while */
	$i = 0;
	$array = array("apple", "banana", "grape");

	while ($array[$i]) {
		echo $array[$i]. " ";

		$i++;
	}

?>
