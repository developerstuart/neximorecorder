<?php
	echo file_get_contents("https://nexmocreator.glitch.me/start");
	$handle = fopen("scriptPosition.json", "w+");
	fwrite($handle, "");
	fclose($handle);
?>
[/eof]... All reset