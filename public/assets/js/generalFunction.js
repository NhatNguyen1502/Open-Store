function toggleForm() {
    var loginForm = document.getElementById("loginForm");
    var signupForm = document.getElementById("signupForm");

    if (loginForm.style.display === "none") {
        loginForm.style.display = "flex";
        signupForm.style.display = "none";
        loginForm.scrollIntoView({ behavior: "instant", block: "end" });
    } else {
        loginForm.style.display = "none";
        signupForm.style.display = "flex";
        signupForm.scrollIntoView({ behavior: "instant", block: "end" });
    }
}
