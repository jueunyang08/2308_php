<?php
//ID만 출력해 주세요.
// ID List
//meerkat1
//meerkat2
//meerkat3
$arr = [
	[
		"id" => "meerkat1",
		"pw" => "php504"
	],
	[
		"id" => "meerkat2",
		"pw" => "php504"
	],
	[
		"id" => "meerkat3",
		"pw" => "php504"
	]
	];
	echo "ID 리스트\n";
	foreach($arr as $val) {
		echo $val["id"],"\n";
	}