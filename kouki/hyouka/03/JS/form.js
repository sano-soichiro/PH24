$(function(){
  $('.input_area').each(function(index){
    $(this).focusin(function () {
      $(".ft").eq(index).removeClass("form_title").addClass("form_title_active");
      console.log($(".ft").eq(index));
      $(".ft").eq(index).css('color','#0768E6');
    }).
    focusout(function(){
      if($(this).val().length == 0){
        $(".ft").eq(index).removeClass("form_title_active").addClass("form_title");
        console.log($(".ft").eq(index));
      }
      $(".ft").eq(index).css('color','#5F6368');
    });
    if($(this).val().length != 0){
      $(".ft").eq(index).removeClass("form_title").addClass("form_title_active");
      $(".ft").eq(index).css('color','#5F6368');
    }
  });
});