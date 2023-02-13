<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="onload_js.js"></script>
	<title><?php echo $title; ?></title>
</head>
<body>
	<?php
		$str = "";

		foreach($options as $opt) {
			$opt_no = substr($opt["value"], 1, 1);
			$opt_type = ($data["type"] === "S") ? "radio" : "checkbox";
			if ($opt["is_answer"]) {
				$answers[] = $opt_no;
			}
			$str .= "<input type=" . $opt_type . " class='opts' name='opts' value=$opt_no> " . $opt['value'] . "<br>";
		}


		echo "<h2>$title</h2>";
		echo "<div id='score_wrap'>Score is <span id='score'>" . $_SESSION["correct"] . "</span></div>";
		echo "<p>" . $no . ") " . $data["question"] . "</p>";
		echo $str;
		if ($last) {
			echo "<p style='color: var(--highlight);'>This is the last Question!</p>";
		}
	?>

	<div>
		<p style="text-align: center;"><input id="answer" class="buttons" type="button" value="Answer" onclick="evaluate_input()" /></p>
		<p id="answer_text"></p>
	</div>

	<script type="text/javascript">
		<?php include __DIR__ . "/play_js.js"; ?>
	</script>

</body>
</html>