const fileUpload = document.getElementById("file-upload");
const fileLabelText = document.getElementById("file-label-text");
const fileUploadCompany = document.getElementById("file-upload-company");
const fileLabelTextCompany = document.getElementById("file-label-text-company");
const fileUploadResume = document.getElementById("file-upload-resume");
const fileLabelTextResume = document.getElementById("file-label-text-resume");

function capitalizeFirstLetter(input) {
    input.value = input.value.charAt(0).toUpperCase() + input.value.slice(1);
}
function handleFile(type) {
    if (type === "seeker") {
        if (fileUpload.files.length > 0) {
            fileLabelText.textContent = fileUpload.files[0].name + "🔗";
        } else {
            fileLabelText.textContent = "Upload Profile Photo 🔗";
        }
    } else if (type === "company") {
        if (fileUploadCompany.files.length > 0) {
            fileLabelTextCompany.textContent =
                fileUploadCompany.files[0].name + "🔗";
        } else {
            fileLabelTextCompany.textContent = "Upload Company Logo 🔗";
        }
    } else if (type === "resume") {
        if (fileUploadResume.files.length > 0) {
            fileLabelTextResume.textContent =
                fileUploadResume.files[0].name + "🔗";
        } else {
            fileLabelTextResume.textContent = "Upload Your Resume 🔗";
        }
    }
}
function changePhoto(type) {
    const reader = new FileReader();
    if (type === "seeker") {
        var file = fileUpload.files[0];
        reader.onload = function (e) {
            document.getElementById("view-photo").src = e.target.result;
        };
    } else if (type === "company") {
        var file = fileUploadCompany.files[0];
        reader.onload = function (e) {
            document.getElementById("view-photo").src = e.target.result;
        };
    }

    reader.readAsDataURL(file);
}
