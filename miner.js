
var iss = 0;
var i = 0;
var t = "1";

function clock(){
    var date = new Date(),
    hours = (date.getHours() < 10) ? '0' + date.getHours() : date.getHours(),
    minutes = (date.getMinutes() < 10) ? '0' + date.getMinutes() : date.getMinutes(),
    seconds = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();
    document.getElementById('clock').innerHTML = hours + ':' + minutes + ':' + seconds;
   }
setInterval(clock, 1000);
clock();

function mine(){
var mywallet = $('#mywalletid').val();
if (mywallet != ""){

var loc = 0;
while (loc < 2) {

        var array = new Uint32Array(10);
        window.crypto.getRandomValues(array);

        t = array[1].toString();
        t = sha256(t);
        iss = iss + 1;
        if(iss == 10000) {
            iss = 0;
            
            $.ajax({
                url         : 'getun.php',
                type        : 'POST',
                success: function(data){
                    $('#mmm').html(data);
                    console.log(document.getElementById('clock').innerHTML, ": It's mining...");
                    $('#iframeconsole').append(document.getElementById('clock').innerHTML, ": It's mining...<br>");
                    document.getElementById('iframeconsole').scrollTop = document.getElementById('iframeconsole').scrollHeight;
                }
            });
            $.ajax({
                url         : 'getconf.php',
                type        : 'POST',
                success: function(data){
                    $('#nnn').html(data);
                }
            });
        }

    if (t.substring(0,4) == "0000") {
        var previouslocalnumber = localnumber;

        $.ajax({
            url         : 'getun.php',
            type        : 'POST',
            success: function(data){
                $('#mmm').html(data);
                console.log(document.getElementById('clock').innerHTML, ": It's mining...");
                $('#iframeconsole').append(document.getElementById('clock').innerHTML, ": It's mining...<br>");
                document.getElementById('iframeconsole').scrollTop = document.getElementById('iframeconsole').scrollHeight;
            }
        });
        $.ajax({
            url         : 'getconf.php',
            type        : 'POST',
            success: function(data){
                $('#nnn').html(data);
            }
        });

        if (previouslocalnumber == localnumber) {

            $.ajax({
                url         : 'getconf.php',
                type        : 'POST',
                success: function(data){
                    $('#nnn').html(data);
                }
            });
            
            var newprevHash = blocalSender + blocalRecipient + blocalCost + blocalHash;
            newprevHash = sha256(newprevHash);
            var randhash = t;
            var randnum = array[1].toString();
            
            $.ajax({
                url         : 'addtoblockchain.php',
                type        : 'POST',
                data        : {unum1: localnumber, rhash1: randhash, rnum1: randnum, prevhash1: newprevHash, bnum1: blocalNumber, resipient1: localRecipient, mywallet1: mywallet, eds1: localEDS, sender1: localSender, cost1: localCost, thecommission1: localCommission, information1: localInformation},
                success: function(data){
                    $('body').append(data);
                }
            });

            i = i + 1;
            document.getElementById("sum").innerHTML = i.toString();
            console.log(document.getElementById('clock').innerHTML, ": NICE!");
            $('#iframeconsole').append(document.getElementById('clock').innerHTML, ": NICE!<br>");
            document.getElementById('iframeconsole').scrollTop = document.getElementById('iframeconsole').scrollHeight;

        }
    }
    t = "1";

    loc = loc + 1;
}
} else {
    clearInterval(tim);
    alert("Укажите ID кошелька для майнинга");
    unshowmine();
}
}

var tim = setInterval(() => {
    mine();
}, 1);
clearInterval(tim);