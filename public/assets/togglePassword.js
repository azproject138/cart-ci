function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(`${fieldId}-icon`);
    if (field.type === "password") {
        field.type = "text";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    } else {
        field.type = "password";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    }
}