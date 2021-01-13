// $(document).ready(function () {
    $(".custom-file-input").on('change', loadPicture);

    function loadPicture(event) {

        const reader = new FileReader();
        const output = $("#change-picture");
        reader.onload = function () {
            output[0].src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        $("#im").class('display', 'none');
    }
// })
