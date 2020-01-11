/*var response = prompt("Are we there yet?");

while (response !== "yes" && response != "yeah") {
  var response = prompt("Are we there yet?");
}

alert("Yes, we finally made it!!");*/

var response = prompt("Are we there yet?");

while (response.indexOf("yes") === -1 && response.indexOf("yeah") === -1) {
  var response = prompt("Are we there yet?");
}

alert("Yes, we finally made it!!");
