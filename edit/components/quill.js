// Initialize Quill editor

var quill = new Quill("#editor", {
    modules: {
        'toolbar': [
            [{ 'size': [] }],
            [ 'bold', 'italic', 'underline', 'strike' ],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'script': 'super' }, { 'script': 'sub' }],
            [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block' ],
            [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
            [ {'direction': 'rtl'}, { 'align': [] }],
            [ 'link', 'image', 'video', 'formula' ],
            ['clean']
        ]
    },
    placeholder: "Start typing to add content...",
    theme: "snow", // or 'bubble'
});

function submit_newpage() {
    document.querySelector("#content").value = quill.root.innerHTML;
    document.querySelector("#title").value = document.querySelector(".title").innerHTML;

    document.querySelector(".form").submit();
}

function submit_newpost() {
    document.querySelector("#content").value = quill.root.innerHTML;
    document.querySelector("#title").value = document.querySelector(".title").innerHTML;
    document.querySelector("#tags").value = document.querySelector(".tags").innerHTML;

    document.querySelector(".form").submit();
}

function submit_update() {
    document.querySelector("#content").value = quill.root.innerHTML;

    document.querySelector(".form").submit();
}
