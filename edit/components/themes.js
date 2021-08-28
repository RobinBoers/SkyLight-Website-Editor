function uploadFile(type) {
    document.getElementById("theme-upload").click();
    document.getElementById("theme-upload").addEventListener("change", (e) => {
        document.getElementById("theme-form").submit();
    });
}