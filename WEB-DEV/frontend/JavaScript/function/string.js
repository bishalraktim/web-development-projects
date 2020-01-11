function kebabToSanke(key) {
  var str = key.replace(/-/g , "_");
  return str;
}

enterString = prompt("Enter the string!");
alert(kebabToSanke(enterString));
