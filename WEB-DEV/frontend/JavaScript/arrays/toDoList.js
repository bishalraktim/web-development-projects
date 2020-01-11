/*var newList = ["Enter the name"];
var input = prompt("What would you like to do?");

while (input !== "quit") {

  if (input === "new") {
    var newInput = prompt("Enter new todo");
    newList.push(newInput);
    //console.log(newList);
    input = prompt("What would you like to do?");
  }
  else if (input === "list") {
    console.log(newList);
    break;
    //input = prompt("What would you like to do?");
  }
  else {
    console.log("You quit the app or entered something else!");
    break;
    }
  }
  console.log("That's fine, you quit the app!");*/

  var newList = ["New Array"];
  var input = prompt("What would you like to do?");

  while (input !== "quit") {

    if (input === "new") {
      newToDo();
    }
    else if (input === "delete") {
      deleteToDo();
    }
    else if (input === "list") {
      listToDo();
    }
    //console.log("**********")
    input = prompt("What would you like to do?");
  }

  console.log("That's fine, you quit the app!");

  function newToDo() {
    var newInput = prompt("Enter new todo");
    newList.push(newInput);
    console.log("You have added: " + newInput)
  }

  function deleteToDo() {
    var index = prompt("Enter the index of newList to delete!");
    var remove = newList.splice(index, 1);
    console.log("You have deleted: " + remove);
  }

  function listToDo() {
    console.log("**********");
    /*newList.forEach(function(string){
      console.log(newList.indexOf(string) + ": " + string);
    });*/

    // alternative method:
    newList.forEach(function(string, number){
      console.log(number + ": " + string);
    });
    console.log("**********");
  }
