var i = 1;
var fact = 1;

function myFact(num) {
  if (num === 0) {
    return 1;
  }

  else {
    while (i < num) {
      fact = fact * num;
      num = num - 1;
      fact = fact * 1;
    }
    return fact;
  }
}
console.log(myFact(4));
//alert(myFact(4));
