import { errorValidation } from "./../common/errorValidation";
let validationList = [
  {
    selector: "#name",
    checkValue: "",
    errorMsg: "Please fill user name!",
  },
  {
    selector: "#email",
    checkValue: "",
    errorMsg: "Please fill user email!",
  },
  {
    selector: "#password",
    checkValue: "",
    errorMsg: "Please fill user password!",
  },
];
$("#btn-submit").on("click", function (e) {
  errorValidation(validationList, "#createUserForm", "#validateCreateUser", e);
});
