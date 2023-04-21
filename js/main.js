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

// Access Upload File Name To Style it in .upload-name

let uploadLabel = document.querySelectorAll(".upload");
let uploadInput = document.querySelectorAll("input[type=file]");
let uploadName = document.querySelectorAll(".upload-name");

//console.log(uploadName);

uploadInput.forEach((ele) => {
	ele.addEventListener("change", () => {
		for (let i = 0; i < ele.files.length; i++) {
			uploadName[i].innerHTML += `<div>${ele.files[i].name}</div>`;
		}
	});
});

// // Making The Image Appeare When Uploaded
// function showMyImage(fileInput) {
// 	var files = fileInput.files;
// 	console.log(files);
// 	for (var i = 0; i < files.length; i++) {
// 		var file = files[i];
// 		console.log(file.name);
// 		var imageType = /image.*/;
// 		if (!file.type.match(imageType)) {
// 			continue;
// 		}
// 		var img = document.getElementById("thumbnil");
// 		img.file = file;
// 		var reader = new FileReader();
// 		reader.onload = (function (aImg) {
// 			return function (e) {
// 				aImg.src = e.target.result;
// 			};
// 		})(img);
// 		reader.readAsDataURL(file);
// 		thumbnil.style.display = "block";
// 		//$("#banner_name").text(file.name);
// 	}
// }

// Making the upload icon fade when hovering it

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
