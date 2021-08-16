<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$number = $_POST['number'];
	$blood = $_POST['blood'];
	$remarks = $_POST['remarks'];

	if(empty($name)){

		echo "Please fill it up!";

	}


	if(empty($address)){

		echo "Please fill it up!";

	}

	if(empty($number)){

		echo "Please fill it up!";

	}

	if(empty($blood)){

		echo "Please fill it up!";
	}

	if(empty($remarks)){

		echo "Please fill it up!";

	}


	else{
		echo"Successfully Saved!";
		
	}
}

