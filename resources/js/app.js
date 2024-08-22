import './bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    var fileInput = document.querySelector('input[type="file"]');
    fileInput.addEventListener('change', function (e) {
        var label = e.target.nextElementSibling;
        if (label && e.target.files.length > 0) {
            label.textContent = e.target.files[0].name;
        } else {
            label.textContent = "لم يتم اختيار ملف";
        }
    });
});