<?php
	$file = "scriptPosition.json";

	if(file_get_contents($file) == "") {
		$obj = new StdClass();
		$obj -> start = time();
		$obj -> audioData = Array();
		$obj -> anchors = Array();
		$obj -> mp3 = "";

		$handle = fopen($file, "w+");
		fwrite($handle, json_encode($obj));
		fclose($handle);
	}

	$obj = json_decode(file_get_contents($file));

	$anchor = new StdClass();
	$anchor -> time = time();
	$anchor -> reltime = time() - $obj -> start;
	$anchor -> anchorindex = $_GET['data']['anchor'];

	$obj -> anchors[] = $anchor;

	$handle = fopen($file, "w+");
	fwrite($handle, json_encode($obj));
	fclose($handle);
?>