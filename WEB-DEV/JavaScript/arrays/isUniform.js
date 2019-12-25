//var array = ["Raktim", "Paila", "Yatra", "Sangram"];
//var array = ["1", "1", "1", "105", "1"];

var i = 1;

function isUniform(array) {
  var element = array[0];

  while (i < array.length) {
    if (element === array[i]) {
      i++;
      //console.log(i);
    }
    else {
      //console.log("false info");
      return false;
    }
  }
  console.log("All Done!");
  return true;
}

var holdData = isUniform(["Raktim", "Raktim", "Raktim", "Raktim"]);
console.log(holdData);
