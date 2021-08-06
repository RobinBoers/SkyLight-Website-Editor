function uploadFile(type) {
    if (type == "logo") {
        document.getElementById("logo-upload").click();
        document.getElementById("logo-upload").addEventListener("change", (e) => {
            document.getElementById("logo-form").submit();
        });
    } else if (type == "data") {
        document.getElementById("data-upload").click();
        document.getElementById("data-upload").addEventListener("change", (e) => {
            document.getElementById("data-form").submit();
        });
    }
}
