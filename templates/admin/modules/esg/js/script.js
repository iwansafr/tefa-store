$(document).ready(function(){
  $('.dropdown-submenu a.dropdown-toggle').on("click", function(e){
  	// $(this).siblings()next('ul')
    var a = $(this).parent();
    $(a).siblings().find('ul').css('display','none');
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});