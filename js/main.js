// Drop Down List Function Import

import { dropDownList } from "./dropdownlist.js";

dropDownList();

// *Code Your Js Here //

// Make The Link Active When Clicked

let currentLocation = location.href;
let allLinks = document.querySelectorAll("nav a");

allLinks.forEach((ele) => {
	if (ele.href === currentLocation) {
		ele.classList.add("active");
	}
});

// Links Toggler

let toggler = document.querySelector("nav ul .icon");
let linksDiv = document.querySelector("nav ul .links");

toggler.addEventListener("click", () => {
	linksDiv.classList.toggle("deactive");
});

// Making the upload icon fade when hovering it
let uploadLabel = document.querySelectorAll(".upload");
let uploadIcon = document.querySelectorAll(".fa-upload");

for (let i = 0; i < uploadLabel.length; i++) {
	uploadLabel[i].addEventListener("mouseenter", () => {
		uploadIcon[i].classList.add("fa-fade");
	});
	uploadLabel[i].addEventListener("mouseleave", () => {
		uploadIcon[i].classList.remove("fa-fade");
	});
}

// Details Button Toggle
let allMemberDetailsButtons = document.querySelectorAll(
	".member-box .member-details-btn"
);
let memberDetailsBtn = document.querySelector(".member-details-btn");

allMemberDetailsButtons.forEach((btn) => {
	btn.addEventListener("click", () => {
		let memberDetails = btn.parentElement.parentElement.nextElementSibling;
		memberDetails.classList.toggle("deactive");
	});
});

const buttons = document.querySelectorAll(".upload-button");
const fileLists = document.querySelectorAll(".file-list");

buttons.forEach((button, i) => {
	button.addEventListener("change", function () {
		displayFile(this.files, fileLists[i]);
	});
});

function displayFile(files, fileList) {
	fileList.innerHTML = "";

	// Loop Through The Files And Display Each File Name and Preview
	for (let i = 0; i < files.length; i++) {
		const fileName = document.createElement("p");
		fileName.textContent = `اسم الملف:   ${files[i].name}`;
		fileList.appendChild(fileName);
		console.log(files[i].type);
		if (files[i].type === "image/jpeg" || files[i].type === "image/png") {
			const filePreview = document.createElement("img");
			filePreview.src = URL.createObjectURL(files[i]);
			fileList.appendChild(filePreview);
		}
	}
}
