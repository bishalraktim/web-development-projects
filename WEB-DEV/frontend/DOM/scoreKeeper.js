var p1Button = document.querySelector("#p1");
var p2Button = document.getElementById("p2");
//var h1 = document.getElementsByTagName('h1')[0];
//console.log(h1);

var p1Record = document.getElementById("p1Display");
var p2Record = document.getElementById("p2Display");
var p1Score = 0;
var p2Score = 0;

var gameOver = false;
var winningScore = 5;

var resetButton = document.getElementById("reset");

var inputButton = document.querySelector("input");
var playScore = document.querySelector("p span");

p1Button.addEventListener("click", function(){
  if(!gameOver) {
    p1Score++;
    //console.log(p1Score, winningScore);
    if(p1Score === winningScore) {
      gameOver = true;
      p1Record.classList.add("winner");
    }
  }
  p1Record.textContent = p1Score;
});


p2Button.addEventListener("click", function(){
  if(!gameOver) {
    p2Score++;
    if(p2Score === winningScore) {
      p2Record.classList.add("winner");
      gameOver = true;
    }
  }
  p2Record.textContent = p2Score;
});

resetButton.addEventListener("click", function() {
  reset();
});

inputButton.addEventListener("change", function(){
  // playScore.textContent = inputButton.value;
  // winningScore = Number(inputButton.value);
  playScore.textContent = this.value;
  winningScore = Number(this.value);
  reset();
});

function reset() {
  p1Score = 0;
  p2Score = 0;
  p1Record.textContent = 0;
  p2Record.textContent = 0;
  p1Record.classList.remove("winner");
  p2Record.classList.remove("winner");
  gameOver = false;
}
