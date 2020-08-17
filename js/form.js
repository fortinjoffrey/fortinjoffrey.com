var form = document.querySelector(".needs-validation");

form.addEventListener("submit", function (event) {
  if (form.checkValidity() === false) {
    event.preventDefault(); // stop the form action (does not call the php)
    event.stopPropagation();
  }
  form.classList.add("was-validated");
});
