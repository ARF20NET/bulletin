<?php

$date = "";
$text = "";
$dopublish = false;
if (isset($_POST["date"])) {
	$date = $_POST["date"]; $text = $_POST["text"];
	$dopublish = true;
}

function scan_dir($dir) {
	$ignored = array('.', '..', '.svn', '.htaccess', '.php', '.html');

	$files = array();    
	foreach (scandir($dir) as $file) {
		if (in_array($file, $ignored)) continue;
		$files[$file] = filemtime($dir . '/' . $file);
	}

	arsort($files);
	$files = array_keys($files);

	return ($files) ? $files : false;
}

//$dir = getcwd();
$dir = "bulletin/";


if ($dopublish) {
	$files = scan_dir($dir);
	$filenames = array();
	for ($i = 0; $i < count($files); $i++) {
		if (strpos($files[$i], 'txt')) array_push($filenames, basename($files[$i], ".txt"));
	}
	rsort($filenames);

	$nextfile = intval($filenames[0]) + 1;

	file_put_contents($dir.$nextfile.".txt", "<h3>".$date."</h3>\n<p>".$text."</p>");
}

?>


<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <title>ARFNET</title>
		<style>
			.title {
				font-size: 36px;
			}
			
			header *{
				display: inline-block;
			}
			
			* {
				vertical-align: middle;
				max-width: 100%;
			}
			
			.text {
				width: 500px;
				height: 200px;
			}
			
			.form {
				margin: 20px;
				padding: 20px;
				//border: solid 1px;
			}
		</style>
    </head>

    <body>
		<header>
			<img src="/arfnet_logo.png" width="64">
			<span class="title"><strong>ARFNET</strong></span>
		</header>
		<hr>
		<a class="home" href="/">Home</a><br>
		<h2>ARFNET Bulletin Publish Form</h2>
		<hr>
		<form class="form" method="POST" action="publish.php">
			<label>Date</label><br>
			<input type="text" name="date"></input><br>
			<label>Message</label><br>
			<textarea class="text" name="text"></textarea><br><br>
			<input type="submit" value="Submit"></input>
		</form>
	</body>
</html>