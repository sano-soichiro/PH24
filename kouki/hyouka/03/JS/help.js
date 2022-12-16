$('#help').hover(function(){
    console.log('aaa');
    $('#help_msg').fadeIn(100);
},function(){
    $('#help_msg').fadeOut(100);
    console.log('bbb');
});