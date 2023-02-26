const form = document.getElementById("contact-form");

form.addEventListener("submit", (event) => {
  event.preventDefault(); // prevent the form from submitting via HTTP
  const formData = new FormData(form); // create a FormData object from the form data
  fetch("https://www.carlosmeister.com/contact.php", {
    method: "POST",
    body: formData
  })
    .then(response => {
      if (response.ok) {
        // handle successful form submission
        console.log("Form submitted successfully");
        // display a success message to the user, for example:
        const successMessage = document.getElementById("submitSuccessMessage");
        successMessage.classList.remove("d-none");
        form.reset();
      } else {
        // handle form submission error
        console.log("Error submitting form");
        // display an error message to the user, for example:
        const errorMessage = document.getElementById("submitErrorMessage");
        errorMessage.classList.remove("d-none");
      }
    })
    .catch(error => {
      console.log("Error submitting form:", error);
      // handle form submission error
      const errorMessage = document.getElementById("submitErrorMessage");
      errorMessage.classList.remove("d-none");
    });
});
