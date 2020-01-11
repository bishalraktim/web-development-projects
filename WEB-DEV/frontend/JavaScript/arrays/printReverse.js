//var array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
//var array = ["bishal", "raktim", "yatra", "paila", "sangram", "parinam", "sankat"];

function printReverse(array) {
  for (var i = 1; i < array.length; i++) {
    console.log(array[array.length - i]);
  }
  console.log(array[0]);
}

//printReverse(["bishal", "raktim", "yatra", "paila", "sangram", "parinam", "sankat"]);
printReverse([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
