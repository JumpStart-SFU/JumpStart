function validateUsername(username) {
  return (username == "") ? "Username is empty.\n" : "";
}

function validatePassword(password_1, password_2) {
  if (password_1 == "") {
    return "No password was entered.\n";
  }
  
  else if (password_1.length < 8) {
    return "Passwords must be at least 8 characters long. \n";
  }
  
  else if (!/[a-z]/.test(password_1) || ! /[A-Z]/.test(password_1) || !/[0-9]/.test(password_1)) {
    return "Passwords require at least one lowercase, one uppercase and one number.\n";
  }
  
  else if (password_1 !== password_2) {
    return "Your passwords do not mtach.\n";
  }
  
  return "";
}

function validateFullname(fullname) {
  return (fullname == "") ? "Full name is empty.\n" : "";
}

function validateSex(sex) {
  return (sex == "") ? "Sex is empty.\n" : "";
}

function validateEmail(email) {
  return (email=="") ? "Email is empty.\n" : "";
}
