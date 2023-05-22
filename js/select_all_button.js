// Select All Checkbox in Attendance

let allCheckBoxes = document.querySelectorAll(".check");
let selectAllCheck = document.querySelector(".select-all");

allCheckBoxes.forEach((check) => {
	selectAllCheck.addEventListener("click", () => {
		check.checked = selectAllCheck.checked;
	});
});
