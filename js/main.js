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

function toggleLinks() {
	if (linksDiv.className === "links") {
		linksDiv.classList.add("deactive");
	} else {
		linksDiv.classList.remove("deactive");
	}
}

toggler.addEventListener("click", toggleLinks);
