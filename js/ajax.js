$(document).ready(function(){
  //ajax navbar anchors
  $("body>nav .ajax-link").on("click", function(event){
    $target = $(this);
    event.preventDefault();
    $("main").fadeOut(300,function(){
      loadMain($target);
    });
  });

  function loadMain($element){
    $("main").load($element.attr("href")+" main",completeFunction);
  }

  //ajax search bar
  $("body>nav form>button").on("click",function(event){
      event.preventDefault();
      $target = $(this).parent();

      $("main").fadeOut(300,function(){
        loadSearch($target);
      });
  });
  //ajax add to cart
  $(".add-to-cart").on("click",function(event){
    var buttonId = $(this).attr("id");
    var productId = buttonId.replace("product","");
    // console.log(productId);
    $.post("add_to_cart.php",{"productId":productId});
  });
  
  function loadSearch($element){
    "use strict";
    //find get variables
    var data = {};
    // data ={
    //   inputName:"inputValue",
    //   input2Name:"input2Value"
    // };

    $element.find("input").each(function(index,input){
      data[input.name] = input.value; 
    });
    $("main").load($element.attr("action")+ " main",data,completeFunction);
  }
  function completeFunction(responseText, textStatus, request){
    if(textStatus == "error"){
      $("main").text("An error occurred during your request: "+
      request.status +" "+request.statusText);
    }
    $("main").fadeIn(300);
  }
});