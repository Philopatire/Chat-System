// Form handler
let loginSubmit = document.querySelector("#login_form button[type='submit']");
let signUpSubmit = document.querySelector("#signup_form button[type='submit']");
let forgotSubmit = document.querySelector("#forgot_form button[type='submit']");
let chatSubmit = document.querySelector("#chat_form button[type='submit'");
function validation(object) {
  function error(o) {
    if (o.placeholdered == true) {
      o.el.classList.add("error");
      o.el.setAttribute("placeholder", o.error_msg);
    } else {
      o.label.style.color = "red";
      o.label.textContent = o.error_msg;
    }
    validate = false;
  }
  function valid(o) {
    if (o.placeholdered == true) {
      o.el.classList.remove("error");
      o.el.setAttribute("placeholder", o.default_msg);
    } else {
      o.label.style.color = "";
      o.label.textContent = o.default_msg;
    }
  }
  let validate = true;
  for (obj in object) {
    let o = object[obj];
    // Check Validate Type
    if (o.type == "string") {
      if (o.el.value.trim() == "") {
        error(o);
      } else {
        valid(o);
      }
    } else if (o.type == "email") {
      if (
        !/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test(o.el.value.trim()) ||
        o.el.value.trim() == ""
      ) {
        error(o);
      } else {
        valid(o);
      }
    } else if (o.type == "passwordValidate") {
      if (
        object.pass.el.value.trim() != o.el.value.trim() ||
        o.el.value.trim() == ""
      ) {
        error(o);
      } else {
        valid(o);
      }
    }
  }
  return validate;
}
function togglePasswordVisibilty(el, target) {
  el.addEventListener("click", () => {
    el.classList.toggle("visible");
    if (el.classList.contains("visible")) target.setAttribute("type", "text");
    else target.setAttribute("type", "password");
  });
}

if (loginSubmit) {
  let nameInput = document.getElementById("name_input");
  let passInput = document.getElementById("pass_input");
  loginSubmit.addEventListener("click", (e) => {
    let validate = validation({
      name: {
        el: nameInput,
        type: "string",
        label: document.querySelector("label[for='name_input']"),
        default_msg: "Name",
        error_msg: "Please enter a valid name",
      },
      pass: {
        el: passInput,
        type: "string",
        label: document.querySelector("label[for='pass_input']"),
        default_msg: "Password",
        error_msg: "Please enter a valid password",
      },
    });
    if (!validate) e.preventDefault();
  });
  togglePasswordVisibilty(
    document.querySelector(".toggle-password-visibilty"),
    passInput
  );
}

if (signUpSubmit) {
  let nameInput = document.getElementById("name_input");
  let emailInput = document.getElementById("email_input");
  let passInput = document.getElementById("pass_input");
  signUpSubmit.addEventListener("click", (e) => {
    let validate = validation({
      name: {
        el: nameInput,
        type: "string",
        label: document.querySelector("label[for='name_input']"),
        default_msg: "Name",
        error_msg: "Please enter a valid name",
      },
      email: {
        el: emailInput,
        type: "email",
        label: document.querySelector("label[for='email_input']"),
        default_msg: "Email",
        error_msg: "Please enter a valid email",
      },
      pass: {
        el: passInput,
        type: "string",
        label: document.querySelector("label[for='pass_input']"),
        default_msg: "Password",
        error_msg: "Please enter a valid password",
      },
    });
    if (!validate) e.preventDefault();
  });
  togglePasswordVisibilty(
    document.querySelector(".toggle-password-visibilty"),
    passInput
  );
}

if (forgotSubmit) {
  let emailInput = document.getElementById("email_input");
  let passInput = document.getElementById("pass_input");
  let passReInput = document.getElementById("pass_reinput");
  forgotSubmit.addEventListener("click", (e) => {
    let validate = validation({
      email: {
        el: emailInput,
        type: "email",
        label: document.querySelector("label[for='email_input']"),
        default_msg: "Email",
        error_msg: "Please enter a valid email",
      },
      pass: {
        el: passInput,
        type: "string",
        label: document.querySelector("label[for='pass_input']"),
        default_msg: "Password",
        error_msg: "Please enter a valid password",
      },
      passValidate: {
        el: passReInput,
        type: "passwordValidate",
        label: document.querySelector("label[for='pass_reinput']"),
        default_msg: "Re-enter Password",
        error_msg: "The password is incorrect",
      },
    });
    if (!validate) e.preventDefault();
  });
  togglePasswordVisibilty(
    document.querySelector(".toggle-password-visibilty.pass-1"),
    passInput
  );
  togglePasswordVisibilty(
    document.querySelector(".toggle-password-visibilty.pass-2"),
    passReInput
  );
}

if (chatSubmit) {
  let chatInput = document.getElementById("chat_input");
  chatSubmit.addEventListener("click", (e) => {
    let validate = validation({
      message: {
        el: chatInput,
        type: "string",
        default_msg: "Enter text",
        error_msg: "Please enter value",
        placeholdered: true,
      },
    });
    if (!validate) e.preventDefault();
  });
}
