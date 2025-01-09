function validateForm(formId) {
    const form = document.getElementById(formId);
    const inputs = form.querySelectorAll("input, select, textarea");
    let valid = true;

    inputs.forEach((input) => {
        if (!input.value || input.value === "Select District" || input.value === "Moving From" || input.value === "Moving To") {
            valid = false;
        }
    });

    if (valid) {
        window.open('contact.html', '_blank'); // Open contact.html as a popup
    } else {
        alert("Please fill in all the required information.");
    }
}
