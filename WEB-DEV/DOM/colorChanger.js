var change = document.querySelector("body");
var color = document.querySelector("button");

// var isWhite = true;
//
// color.addEventListener("click", function () {
//   if(isWhite) {
//     change.style.background = "red";
//   }
//   else {
//     change.style.background = "green";
//   }
//   isWhite = !isWhite;
//   //change.style.background = "green";
// });


//Alternative Method
var isChecked = true;
color.addEventListener("click", function() {
  if(isChecked) {
    change.classList.toggle("bodyBackground");
  }
  else {
    change.classList.toggle("secondBackground");
  }
  isChecked = !isChecked;
});
