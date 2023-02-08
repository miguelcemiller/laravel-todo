// checkbox change text strikethrough
const checkboxes = document.querySelectorAll("#checkbox-js");

checkboxes.forEach((checkbox) =>
    checkbox.addEventListener("change", function () {
        checkbox.checked
            ? checkbox.nextElementSibling.classList.add("strikethrough")
            : checkbox.nextElementSibling.classList.remove("strikethrough");
    })
);
