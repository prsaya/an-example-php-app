/*
 * Answer button listener.
 * Evaluates answer correctness.
 * Updates the score via an Ajax call.
 */
function evaluate_input() {

	const opts = document.getElementsByClassName("opts");
	const answered = [...opts].filter(e => e.checked).map(e => e.value);
	const ans = document.getElementById("answer_text");

	if (answered.length === 0) {
		ans.style.color = "var(--highlight)";
		ans.innerHTML = "Must select at least one answer option!";
		return;
	}

	ans.style.color = "var(--default)";
	const answers = <?php echo json_encode($answers); ?>;
	let correct = "";
	if (answered.length === answers.length &&
			answers.every(e => answered.includes(e))) {
		ans.innerHTML = "<p>Correct answer.</p>";
		correct = "CORRECT";
	}
	else {
		ans.innerHTML = "<p>Incorrect answer.</p>";
	}

	const notes = <?php echo json_encode($data["notes"]); ?>;
	ans.innerHTML += notes;
	document.getElementById("answer").disabled = true;

	const last = <?php echo json_encode($last); ?>;

	if (last) {
		document.getElementById("next").className = "next_disabled";
	}
	else {
		document.getElementById("next").className = "next_enabled";
	}

	update_score(correct);
}

/*
 * Performs an Ajax request and shows updated score.
 */
function update_score(correct) {

	const xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// Request finished and response is ready.
			// The updated score is set from server response.
			document.getElementById("score").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "score.php?value=" + correct, true);
	xmlhttp.send();
}