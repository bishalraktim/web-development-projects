//var array = [1, 10, 30, 50, 2];
var sum = 0;

function sumArray(array) {
  for (var i = 0; i < array.length; i++) {
    sum = sum + array[i];
    //console.log(sum);
    //return sum;
  }
  console.log("The final result is: " + sum);
  return sum;
}

//console.log(sumArray(array));
