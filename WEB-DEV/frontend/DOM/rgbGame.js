var numSquares = 6;
var colors = [];
var pickedColor;

var squares = document.querySelectorAll(".square");
var colorPicker = document.getElementById("colorDisplay");
colorPicker.textContent = pickedColor;
var displayMessage = document.querySelector("#message");
var h1 = document.querySelector("h1");
var resetButton = document.getElementById("reset");
var modeButtons = document.querySelectorAll(".mode");

init();
function init(){
  setupModeButtons();
  setupSquares();
  resets();
}

function setupModeButtons(){
  for (var i = 0; i < modeButtons.length; i++) {
    modeButtons[i].addEventListener("click", function(){
      modeButtons[0].classList.remove("selected");
      modeButtons[1].classList.remove("selected");
      this.classList.add("selected");
      this.textContent === "Easy" ? numSquares = 3 : numSquares = 6; //Ternary Operator
      resets();
    });
  }
}


function setupSquares(){
  for (var i = 0; i < squares.length; i++) {
    //add click listeners to squares
    squares[i].addEventListener("click", function(){
      //grab color of clicked square
      //alert(this.style.backgroundColor);
      var clickedColor = this.style.backgroundColor;
      //compare clickedColor to pickedColor
      //console.log(clickedColor, pickedColor);
      if (clickedColor === pickedColor) {
        displayMessage.textContent = "Correct!";
        resetButton.textContent = "Play Again?";
        changeColors(pickedColor);
        h1.style.backgroundColor = pickedColor;
      }
      else {
        this.style.backgroundColor = "#232323";
        displayMessage.textContent = "Try Again";
      }
    });
  }
}


function resets(){
  resetButton.textContent = "New Colors";
  displayMessage.textContent = "";
  colors = generateRandomColors(numSquares);
  pickedColor = pickColor();
  colorPicker.textContent = pickedColor;

  for (var i = 0; i < squares.length; i++) {
    if (colors[i]) {
      squares[i].style.display = "block";
      squares[i].style.backgroundColor = colors[i];
    }
    else {
      squares[i].style.display = "none";
    }
  }
  h1.style.backgroundColor = "steelblue";
}

resetButton.addEventListener("click", function(){
  resets();
});

function changeColors(color){
  for (var i = 0; i < squares.length; i++) {
    squares[i].style.backgroundColor = color;
  }
}

function pickColor() {
  var random = Math.floor(Math.random() * colors.length);
  return colors[random];
}

function generateRandomColors(num){
  var arr = [];

  for (var i = 0; i < num; i++) {
   var finalString = randomColors();
   arr.push(finalString);
  }
  return arr;
}

function randomColors(){
  var r = Math.floor(Math.random() * 256); // red: 0 to 255
  var g = Math.floor(Math.random() * 256); // red: 0 to 255
  var b = Math.floor(Math.random() * 256); // red: 0 to 255
  var string = "rgb" + "(" + r + ", " + g + ", " + b + ")";
  return string;
}
