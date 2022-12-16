$(function(){
    //ホバーイベント
    $('.link').hover(function(){
        //over
        index = $('.link').index($(this));
        $('.box').eq(index).css('background','#FAFAFA');
        $('.print').eq(index).css('display','flex');
    },function(){
        //out
        console.log('c');
        $('.box').eq(index).css('background','#FFFFFF');
        $('.print').eq(index).css('display','none');
    });
    //時間を取得するイベント
    let now_time = new Date();
    let colon = ':';
    setInterval(function(){
        now_time = new Date();
        if(now_time.getSeconds() % 2 == 0){
            colon = ' ';
        }
        else{
            colon = ':';
        }
        $('#year').text(now_time.getFullYear());
        $('#month').text(now_time.getMonth() + 1);
        $('#day').text(now_time.getDate());
        $('#hour').text(now_time.getHours());
        $('#minute').text(now_time.getMinutes());
        $('#colon').text(colon);
    },500);
});