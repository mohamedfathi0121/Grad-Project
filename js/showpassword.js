// Toggle Password to Text

const inputPassword = document.querySelector("input[type='password']");

const showPasswordIcon = document.querySelector(".fa-eye-slash");

showPasswordIcon.addEventListener("click", () => {
	if (inputPassword.type === "password") {
		inputPassword.type = "text";
		showPasswordIcon.classList.remove("fa-eye-slash");
		showPasswordIcon.classList.add("fa-eye");
	} else {
		inputPassword.type = "password";

		showPasswordIcon.classList.add("fa-eye-slash");
		showPasswordIcon.classList.remove("fa-eye");
	}
});
