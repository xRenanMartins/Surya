function showMsg(msg, ok){
    var cor;
    var corFonte = '#000';
    if(ok == "false" || !ok){
        cor = '#FF1717';
        corFonte = '#FFF';
    }else{
        cor = '#0F6';
        corFonte = '#000';
    }

    var options = {
        id: 'message_from_top',
        position: 'top',
        size: 50,
        backgroundColor: cor,
        delay: 3000,
        speed: 500,
        fontSize: '30px',
        fontColor: corFonte
    };

    $.showMessage('<span style="z-index: 999999; color:'+ corFonte +';">' + msg + '</span>', options);
}