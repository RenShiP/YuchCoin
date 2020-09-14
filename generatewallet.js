
function onlyDigits(){
  this.value = this.value.replace(/[^\d\.]/g, "");
  if(this.value.match(/\./g).length > 1) {
    this.value = this.value.substr(0, this.value.lastIndexOf("."));
  }
}

function convert(aidi){
    aidi = '#' + aidi;
    

    str = $(aidi).val();
    //"тест еще тест"
    //"прошел еще прошел"
    str = str.replace(/'/g,"");
    str = str.replace(/"/g,"");
    str = str.replace(/`/g,"");
    str = str.replace(/>/g,"");
    str = str.replace(/</g,"");
    str = str.replace(/:/g,"");

    $(aidi).val(str);
}

    //-------------------------

function generatewalletid(){
    var PassPhrase = $("#newwalletkey").val();
    var Bits = 512; 

    var RSAkey = cryptico.generateRSAKey(PassPhrase, Bits);

    var PublicKeyString = cryptico.publicKeyString(RSAkey);

    $("#newwalletid").html(PublicKeyString);
}

function showcreate(){
    var walstyle = $('#newwall').css('display');
    var ch = 0;

    if (walstyle == "inline"){
        ch = 1;
    } else {
        ch = 0;
    }

    if(ch == 1){
        $('#newwall').css('display','none');
    }
    else{
        $('#newwall').css('display','inline');
    }
}

function showfaq(){
    var waelstyle = $('#faqbox').css('display');
    var ch = 0;

    if (waelstyle == "inline"){
        ch = 1;
    } else {
        ch = 0;
    }

    if(ch == 1){
        $('#faqbox').css('display','none');
    }
    else{
        $('#faqbox').css('display','inline');
    }
}

function showmine(){

    var ch1 = $('#startbutton').css('display');

    if( ch1 != "inline" ){
        $('#startbutton').css('display','none');
        $('#stopbutton').css('display','inline');
    }else {
        $('#startbutton').css('display','inline');
        $('#stopbutton').css('display','none');
    }
}

function unshowmine(){
    var ch2 = $('#stopbutton').css('display');

    if( ch2 != "inline" ){
        $('#startbutton').css('display','inline');
        $('#stopbutton').css('display','none');
    } else {
        $('#startbutton').css('display','none');
        $('#stopbutton').css('display','inline');
    }
}

function showbalance(){
    var mywallet = $('#mywalletid').val();
    
    $.ajax({
        url         : 'showbalance.php',
        type        : 'POST',
        data        : {uwallet: mywallet},
        success: function(data){
            var mybal = (data / 1).toFixed(5);
            $('#mybalance').html(mybal);
          }
    });
}

function showoborot(){

    $.ajax({
        url         : 'showoborot.php',
        type        : 'POST',
        success: function(data){
            var onum = parseFloat(data).toFixed(5);
            $('#theoborot').html(onum);

            
            var hight = 0;
            hight = (onum / 0.00032).toFixed(0);
            $('#theblockchain').html(hight);
        }
    });
    
}


function putunconfirmed(){

    var Bits = 512; 

    var mywallet = $('#mytransactionid').val();
    var mykey = $('#mytransactionkey').val();
    var recieve = $('#recievetransactionid').val();
    var cost = $('#recievedmoney').val();
    var thecommission = $('#commission').val();
    var information = $('#addinformation').val();

    var foreds = mywallet + recieve + cost;
    foreds = sha256(foreds);

    mykey = cryptico.generateRSAKey(mykey, Bits);
    var eds = cryptico.encrypt(foreds, recieve, mykey);
    eds = eds.cipher;

    var PassPhrase = $("#mytransactionkey").val();
    var Bits = 512; 

    var RSAkey = cryptico.generateRSAKey(PassPhrase, Bits);
    var PublicKeyString = cryptico.publicKeyString(RSAkey);
    
    var thecheck = $("#mytransactionid").val();

    if (PublicKeyString == thecheck){
        $.ajax({
            url         : 'addtounconfirmed.php',
            type        : 'POST',
            data        : {mywallet1: mywallet, eds1: eds, recieve1: recieve, cost1: cost, thecommission1: thecommission, information1: information},
            success: function(data){
                $('body').append(data);
            }
        });
    } else {
        alert("Неверный ключ или ID вашего кошелька");
    }

}