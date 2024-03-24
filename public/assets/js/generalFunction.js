function toggleForm() {
    var currentPath = window.location.pathname;
    if (currentPath === "/loginForm") {
        window.location.href = "/signupForm";
    } else {
        window.location.href = "/loginForm";
    } 
}

