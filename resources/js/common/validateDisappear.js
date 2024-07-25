const validate = document.getElementById("validateDisappear");
validate
  ? setTimeout(() => {
      validate.style.display = "none";
    }, 5000)
  : "";
