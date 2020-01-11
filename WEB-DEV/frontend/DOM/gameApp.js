var numSquares = 6;
var r;
var g;
var b;
var colors = [];
var pickedColor;

var square = document.querySelectorAll(".square");
var changeColor = document.querySelector(".change");
var h1 = document.querySelector("h1");
var message = document.getElementById("message");
var newButton = document.getElementById("newButton");
var easyButton = document.querySelector("#easyButton");
var hardButton = document.querySelector("#hardButton");

init();
function init() {
  resetSquares();
  newButtonReset();
  buttonEasy();
  buttonHard();
}

function resetSquares(){
  colors = setRandomColors();
  pickedColor = colors[Math.floor(Math.random() * numSquares)];

  for (var i = 0; i < square.length; i++) {
    square[i].style.backgroundColor = colors[i];
    changeColor.textContent = pickedColor;

    square[i].addEventListener("click", function(){
      if(this.style.backgroundColor === pickedColor){
        h1.style.backgroundColor = pickedColor;
        message.textContent = "Correct!"
        message.style.color = "green";
        newButton.textContent = "Play Again?"
        for (var i = 0; i < square.length; i++) {
          square[i].style.backgroundColor = pickedColor;
        }
      }
      else {
        this.style.backgroundColor = "#232323";
        message.textContent = "Try Again!";
        message.style.color = "red";
      }
    });
  }
}

function newButtonReset() {
  newButton.addEventListener("click", function() {
    //numSquares = 6;
    h1.style.backgroundColor = "steelblue";
    this.textContent = "New Colors";
    setSquares();
  });
}

function buttonEasy() {
  easyButton.addEventListener("click", function(){
    numSquares = 3;
    this.style.backgroundColor = "steelblue";
    this.style.color = "white";
    easyBtnStyle();
    setSquares();
    for (var i = numSquares; i < 6; i++) {
      square[i].style.display = "none";
    }
    newButtonReset();
  });
}

function buttonHard() {
  hardButton.addEventListener("click", function(){
    numSquares = 6;
    this.style.backgroundColor = "steelblue";
    this.style.color = "white";
    hardBtnStyle();
    setSquares();
  });
}

function easyBtnStyle() {
  hardButton.style.backgroundColor = "white";
  hardButton.style.color = "steelblue";
}

function hardBtnStyle() {
  easyButton.style.backgroundColor = "white";
  easyButton.style.color = "steelblue";
}

function setSquares() {
  colors = setRandomColors();
  pickedColor = colors[Math.floor(Math.random() * numSquares)];
  changeColor.textContent = pickedColor;
  message.textContent = "";

  for (var i = 0; i < numSquares; i++) {
    square[i].style.display = "block";
    square[i].style.backgroundColor = colors[i];
  }
}

function setRandomColors(){
  var arr = [];
  for (var i = 0; i < 6; i++) {
    r = Math.floor(Math.random() * 256);
    g = Math.floor(Math.random() * 256);
    b = Math.floor(Math.random() * 256);
    arr.push("rgb(" + r + ", " + g + ", " + b +")");
  }
  return arr;
}
