// Initialize Quill editor

var quill = new Quill("#editor", {
    modules: {
        toolbar: [[{ header: [1, 2, false] }], ["bold", "italic", "underline"], ["image", "blockquote", "link"], ["code-block"], [{ list: "ordered" }, { list: "bullet" }]],
    },
    placeholder: "Start typing to add content...",
    theme: "snow", // or 'bubble'
});

function submit() {
    document.querySelector("#content").value = document.querySelector(".ql-editor").innerHTML;

    document.querySelector(".form").submit();
}
