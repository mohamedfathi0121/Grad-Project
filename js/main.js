// Drop Down List Function Import

import { dropDownList } from "./dropdownlist.js";

dropDownList();

// *Code Your Js Here //

// Make The Link Active When Clicked

let currentLocation = location.href;
let links = document.querySelectorAll("nav a");

links.forEach((ele) => {
	if (ele.href === currentLocation) {
		ele.classList.add("active");
	}
});
