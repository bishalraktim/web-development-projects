var number = -10;

console.log("Printing Numbers Between -10 and 19");
while (number <= 19) {
  console.log(number);
  number++;
}

console.log("\n");
console.log("Printing Even Numbers Between 10 and 40");

var even = 10;
while (even <= 40) {
  if (even%2 === 0) {
    console.log(even);
  }
  even++;
}

console.log("\n");
console.log("Printing Odd Numbers Between 300 and 333");

var odd = 300;
while (odd <= 333) {
  if (odd%2 !== 0) {
    console.log(odd);
  }
  odd++;
}

console.log("\n");
console.log("Printing Numbers Divisible by 5 and 3 Between 5 and 50");

var num = 5;
while (num <= 50) {
  if (num%5 === 0 && num%3 === 0) {
    console.log(num);
  }
  num++;
}
