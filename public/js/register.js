// preview image
document.querySelector("#image-upload").addEventListener("change", function () {
    let input = this;
    let reader = new FileReader();
    reader.onload = function () {
        let dataURL = reader.result;
        document.querySelector(".image-placeholder").style.height = "130px";
        document.querySelector(".image-placeholder").style.width = "130px";
        document.querySelector(".image-placeholder").src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
});
