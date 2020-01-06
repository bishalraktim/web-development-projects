$("button:nth-of-type(2)").click(function(){
  alert("The button is clicked!");
});

$("button").click(function(){
  var text = $(this).text();
  console.log("You clicked: " + text);
});

$("input").keypress(function(){
  console.log("You've pressed a key!");
});

$("input").keypress(function(event){
  console.log(event);
});
