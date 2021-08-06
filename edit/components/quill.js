// Initialize Quill editor

var quill = new Quill('#editor', {
    modules: {
        toolbar: [
        [{ header: [1, 2, false] }],
        ['bold', 'italic', 'underline'],
        ['image', 'blockquote', 'link'],
        ['code-block'],
        [{ list: 'ordered' }, { list: 'bullet' }]
        ]
    },
    placeholder: 'Add new text to update blogpost',
    theme: 'snow'  // or 'bubble'
});

function submit() {
    document.querySelector("#content").value = document.querySelector(".ql-editor").innerHTML;

    document.querySelector(".form").submit();
}