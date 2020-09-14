
$.ajax({
    url         : 'getun.php',
    type        : 'POST',
    success: function(data){
        $('#mmm').html(data);
        console.log(document.getElementById('clock').innerHTML, ": All ok!");
        $('#iframeconsole').append(document.getElementById('clock').innerHTML, ": All ok! <br>");
    }
});
$.ajax({
                url         : 'getconf.php',
                type        : 'POST',
                success: function(data){
                    $('#nnn').html(data);
                }
});

showoborot();

setInterval(() => {
    showbalance();
    showoborot();
}, 15000);


document.querySelector(".onlyDigits1").onchange = onlyDigits;
document.querySelector(".onlyDigits2").onchange = onlyDigits;

var timeVar='';
body           = document.querySelector('body');
button         = document.querySelector('#faqlink');
my_blok        = document.querySelector('#faqbox');
 
button.onclick = function()
{
    if(my_blok.style.display == "block")
    {
     my_blok.style = "display: none"; 
    }
    else
    {
     my_blok.style = "display: block"; timeVar = 1;  
    }
}
my_blok.onclick = function()
{
timeVar = 1;  
}
 body.onclick = function()
 {
    if(!timeVar)
    {
     my_blok.style = "display: none"; 
    }
    if(timeVar) { setTimeout(function(){ timeVar=''; }, 100);}  
}