var yourAge = Number(prompt("Please enter your age!"));

if (isNaN(yourAge)) {
  alert("Enter the number only!!")
}

if (yourAge < 0) {
  alert("Error! Enter your age correctly!");
}

if (yourAge === 21) {
  alert("Happy 21st Birthday!!");
}

if (yourAge%2 !== 0) {
  alert("Your age is odd!");
}

if (yourAge%Math.sqrt(yourAge) === 0) {
  alert("Hooray! Perfect Square!");
}
