<?php

	$procesado = false;

	for ($i = 1; $i <= 1024; $i++) {
	$url = 'http://158.69.76.135/level0.php';

	$data = array(
	      'id' => 1169,
	      'holdthedoor' => "Submit"
	      );

	$options = array(
		 'http' => array(
		 'header' => "Content-type: application/x-www-form-urlencoded\r\n",
		 'method' => 'POST',
		 'content' => http_build_query($data)
		 ));

	$context = stream_context_create($options);
	$result = file_get_contents($url, false, $context);

	echo "voting :". $i . "<br>";

	if ($i == 1024) {
	   $procesado = true;
	   echo $result;
	   }
	}