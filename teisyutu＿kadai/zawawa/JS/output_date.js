$(function(){
    $('#input_purchase_date').on('input',function(){
        //値を取得
        purchase_date = $(this).val();
        purchase_date = date_display(purchase_date);
        $('#display_purchase_date').text(purchase_date[0]);
        if(purchase_date[1] == 'nomal'){
            $('#display_purchase_date').css('color','#3D3D36');
        }
        else{
            $('#display_purchase_date').css('color','red');
        }
    });
    $('#input_release_date').on('input',function(){
        //値を取得
        release_date = $(this).val();
        release_date = date_display(release_date);
        $('#display_release_date').text(release_date[0]);
        if(release_date[1] == 'nomal'){
            $('#display_release_date').css('color','#3D3D36');
        }
        else{
            $('#display_release_date').css('color','red');
        }
    });
});

function date_display(input_date){
    devided_value = [];
    devided_purchase_date = [];
    output_purchase_date = [];
    devided_value = input_date.split(''); //sprit() 文字を分割する。
    if(devided_value.length == 8){
        color = 'nomal';
    }
    else{
        color = 'warning';
    }
    for(i=0; i<8; i++){
        if(isNaN(devided_value[i])){
            //数値ではない場合
            devided_purchase_date[i] = '?';
            color = 'warning'
        }
        else{
            //数値である場合
            devided_purchase_date[i] = devided_value[i];
        }
    }
    //文字列連結
    for(i=0; i<8; i++){
        output_purchase_date = output_purchase_date + String(devided_purchase_date[i]);
        if(i == 3 || i == 5){
            output_purchase_date = output_purchase_date + '/'
        }
    }
    if(devided_value.length > 8){
        output_purchase_date = '8文字を超えています'       
    }
    if(!isDate(output_purchase_date)){
        color = 'warning';
    }
    result = [output_purchase_date,color];
    return result;
}

function isDate(strDate){
    // 空文字は無視
    if(strDate == ""){
        return true;
    }  
    // 年/月/日の形式のみ許容する
    if(!strDate.match(/^\d{4}\/\d{1,2}\/\d{1,2}$/)){
        return false;
    } 

    // 日付変換された日付が入力値と同じ事を確認
    // new Date()の引数に不正な日付が入力された場合、相当する日付に変換されてしまうため
    // 
    var date = new Date(strDate);  
    if(date.getFullYear() !=  strDate.split("/")[0] 
        || date.getMonth() != strDate.split("/")[1] - 1 
        || date.getDate() != strDate.split("/")[2]
    ){
        return false;
    }

    return true;
}