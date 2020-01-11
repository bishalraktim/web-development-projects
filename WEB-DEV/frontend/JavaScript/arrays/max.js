var array = [10, 11, 7, 505, 2570, 95];
var maxNumber = 0;

function max(array) {

  for (var i = 0; i < array.length; i++) {
    if (maxNumber > array[i]) {
      maxNumber = maxNumber;
      //console.log("maxNumber in if statement is " + maxNumber);
    }
    else {
      maxNumber = array[i];
      //console.log("maxNumber in else statement is " + maxNumber);
    }
  }

  //console.log("\n")
  console.log("The max number is: " + maxNumber);
  return maxNumber;
}

console.log(max(array));
