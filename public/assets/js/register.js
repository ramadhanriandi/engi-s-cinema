function browseFile() {
  document.getElementById("fileInput").click();
}

function putFilename() {
  document.getElementById("filename").value = document.getElementById("fileInput").value.split("\\").pop().split("/").pop();
}

function submitRegisterForm() {
  if (validatePassword() && validateUsername() && validateEmail() && validatePhone()) {
    var username =  document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("password").value;
    var profile_picture = document.getElementById("filename").value;

    var request = new XMLHttpRequest();
    var url = "/api/users/create";
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/json");
    request.onreadystatechange = function () {
      if (request.readyState === 4 && request.status === 200) {
        var jsonData = JSON.parse(request.response);
        console.log(jsonData);
      }
    };

    var data = JSON.stringify({
      "username": username, 
      "email": email, 
      "phone": phone, 
      "password": password,
      "profile_picture": profile_picture
    });

    request.send(data);

    location.href = "/login";
  }
};

function validateUsername() {
  return (/^[a-zA-Z0-9_]*$/.test(document.getElementById("username").value));
}

function showUsernameMessage() {
  fetch("/api/users")
    .then(response => response.json())
    .then(data => {
      for (let i = 0; i < data["count"]; i++) {
        if (data["body"][i]["username"] == document.getElementById("username").value) {
          document.getElementById("username").style.borderColor = "#c7c7c7";
          document.getElementById("input__username-message").style.display = "inherit";
          document.getElementById("input__username-message").innerHTML = "Username " + document.getElementById("username").value + " is exist! Please use another username.";
          
          return true;
        }
      }
      if (!validateUsername()) {
        document.getElementById("input__username-message").style.display = "inherit";
        document.getElementById("input__username-message").innerHTML = "Only accept alphanumeric and underscore";
      } else {
        document.getElementById("input__username-message").style.display = "none";
        document.getElementById("username").style.borderColor = "#0e991a";
      }

      return false;
    })
  ;
}

function validateEmail() {
  return (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(document.getElementById("email").value));
}

function showEmailMessage() {
  fetch("/api/users")
    .then(response => response.json())
    .then(data => {
      for (let i = 0; i < data["count"]; i++) {
        if (data["body"][i]["email"] == document.getElementById("email").value) {
          document.getElementById("email").style.borderColor = "#c7c7c7";
          document.getElementById("input__email-message").style.display = "inherit";
          document.getElementById("input__email-message").innerHTML = "Email " + document.getElementById("email").value + " is exist! Please use another email.";
          
          return true;
        }
      }
      if (!validateEmail()) {
        document.getElementById("input__email-message").style.display = "inherit";
        document.getElementById("input__email-message").innerHTML = "Email format is user@mail.com";
      } else {
        document.getElementById("input__email-message").style.display = "none";
        document.getElementById("email").style.borderColor = "#0e991a";
      }

      return false;
    })
  ;
}

function validatePhone() {
  return (/^[0-9]{9,12}$/.test(document.getElementById("phone").value));
}

function showPhoneMessage() {
  fetch("/api/users")
    .then(response => response.json())
    .then(data => {
      for (let i = 0; i < data["count"]; i++) {
        if (data["body"][i]["phone"] == document.getElementById("phone").value) {
          document.getElementById("phone").style.borderColor = "#c7c7c7";
          document.getElementById("input__phone-message").style.display = "inherit";
          document.getElementById("input__phone-message").innerHTML = "Phone " + document.getElementById("phone").value + " is exist! Please use another phone.";
          
          return true;
        }
      }
      if (!validatePhone()) {
        document.getElementById("input__phone-message").style.display = "inherit";
        document.getElementById("input__phone-message").innerHTML = "Only accept number and consist of 9-12 numbers";
      } else {
        document.getElementById("input__phone-message").style.display = "none";
        document.getElementById("email").style.borderColor = "#0e991a";
      }

      return false;
    })
  ;
}

function validatePassword() {
  return (document.getElementById("password").value == document.getElementById("confirm_password").value || "");
}

function showPasswordMessage() {
  if (!validatePassword()) {
    document.getElementById("input__password-message").style.display = "inherit";
    document.getElementById("input__password-message").innerHTML = "Password confirmation must be same with password";
  } else {
    document.getElementById("input__password-message").style.display = "none";
  }
}