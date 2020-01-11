console.log("Printing Numbers Between -10 and 19");
for (var i = -10; i <= 19; i++) {
  console.log(i)
}

console.log("\n");
console.log("Printing Even Numbers Between 10 and 40");

for (var i = 10; i <= 40; i++) {
  if (i%2 === 0) {
    console.log(i);
  }
}


console.log("\n");
console.log("Printing Odd Numbers Between 300 and 333");

for (var i = 300; i <= 333; i++) {
  if (i%2 !== 0) {
    console.log(i);
  }
}


console.log("\n");
console.log("Printing Numbers Divisible by 5 and 3 Between 5 and 50");

for (var i = 5; i <=50; i++) {
  if (i%5 === 0 && i%3 === 0) {
    console.log(i);
  }
}
