var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function login() {
  x.style.left = "27px";
  y.style.right = "-350px";
  z.style.left = "0px";
}
function register() {
  x.style.left = "-350px";
  y.style.right = "25px";
  z.style.left = "150px";
}

// View Password codes

function myLogPassword() {
  var a = document.getElementById("logPassword");
  var b = document.getElementById("eye");
  var c = document.getElementById("eye-slash");

  if (a.type === "password") {
    a.type = "text";
    b.style.opacity = "0";
    c.style.opacity = "1";
  } else {
    a.type = "password";
    b.style.opacity = "1";
    c.style.opacity = "0";
  }
}

function myRegPassword() {
  var d = document.getElementById("regPassword");
  var b = document.getElementById("eye-2");
  var c = document.getElementById("eye-slash-2");

  if (d.type === "password") {
    d.type = "text";
    b.style.opacity = "0";
    c.style.opacity = "1";
  } else {
    d.type = "password";
    b.style.opacity = "1";
    c.style.opacity = "0";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const logErrorElement = document.querySelector(".log-error");
  if (logErrorElement) {
    setTimeout(function () {
      logErrorElement.classList.add("hide");
    }, 3000);

    logErrorElement.addEventListener("transitionend", function () {
      if (logErrorElement.classList.contains("hide")) {
        logErrorElement.remove();
      }
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const regSuccessElement = document.querySelector(".reg-success");
  if (regSuccessElement) {
    setTimeout(function () {
      regSuccessElement.classList.add("hide");
    }, 3000);

    regSuccessElement.addEventListener("transitionend", function () {
      if (regSuccessElement.classList.contains("hide")) {
        regSuccessElement.remove();
      }
    });
  }
});
