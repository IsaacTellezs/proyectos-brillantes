function togglePassword() {
    const passwordInput = document.getElementById("txt-clave");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}
