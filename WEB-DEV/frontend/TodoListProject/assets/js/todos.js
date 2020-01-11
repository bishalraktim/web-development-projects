$("ul").on("click", "li", function(){
  $(this).toggleClass("completed");
});

$("ul").on("click", "span", function(event){
  $(this).parent().fadeOut(600, function(){ //this - refers to "span"
    $(this).remove(); //this - refers to the parent element "li"
  });
  event.stopPropagation();
});

$("input[type='text']").on("keypress", function(event){
  if(event.which === 13) {
    var todoText = $(this).val();
    $("ul").append("<li><span><i class='fas fa-trash'></i></span> " + todoText + "</li>");
    $(this).val("");
  }
});

$(".fa-plus").on("click", function(){
  $("input[type='text']").fadeToggle();
});
