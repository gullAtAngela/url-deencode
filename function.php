<?php
$type = $_POST['type'] ?? '';
$uri = $_POST['uri'] ?? '';

if (!isset($type) || empty($uri)) {
	echo "<div class=\"alert alert-info\" role=\"alert\"><h4><strong>Hinweis:</strong></h4> Bitte schreib eine encodierte URI in das Feld.</div>";
} elseif ($type == "decode") {
	echo wordwrap(
		urldecode($uri),
		75,
		"<br />\n"
	);
} else {
	echo wordwrap(
		urlencode($uri),
		75,
		"<br />\n"
	);
}
?>
