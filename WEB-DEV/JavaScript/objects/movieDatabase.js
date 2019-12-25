var movies = [
  {
    title: "\"The Hunting House\"",
    rating: 5,
    hasWatched: true
  },

  {
    title: "\"The Recurring Dream\"",
    rating: 4.5,
    hasWatched: false
  },

  {
    title: "\"The Evil Dead\"",
    rating: 5,
    hasWatched: false
  },

  {
    title: "\"Scary Stories\"",
    rating: 5,
    hasWatched: true
  }
];

/*for (var i = 0; i < movies.length; i++) {
  var output = movies[i].hasWatched;
  if (output === true) {
    console.log("You have watched " + movies[i].title + " - " + movies[i].rating + " stars");
  }
  else {
    console.log("You have not seen " + movies[i].title + " - " + movies[i].rating + " stars");
  }
}*/

function buildString(arg) {
  for (var i = 0; i < arg.length; i++) {
    var output = arg[i].hasWatched;
    if (output === true) {
      console.log("You have watched " + arg[i].title + " - " + arg[i].rating + " stars");
    }
    else {
      console.log("You have not seen " + arg[i].title + " - " + arg[i].rating + " stars");
    }
  }
}

buildString(movies);
