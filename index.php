<head>
    <title>YuchCoin</title>

    <script type="text/javascript" src="cryptico/jsbn.js"></script>
    <script type="text/javascript" src="cryptico/random.js"></script>
    <script type="text/javascript" src="cryptico/hash.js"></script>
    <script type="text/javascript" src="cryptico/rsa.js"></script>
    <script type="text/javascript" src="cryptico/aes.js"></script>
    <script type="text/javascript" src="cryptico/api.js"></script>

    <script type="text/javascript" src="sha256.js"></script>
    <script type="text/javascript" src="miner.js"></script>

    <script type="text/javascript" src="jquery.js"></script>
    <link rel="shortcut icon" href="yuchcoinlogo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="mainstyles.css">

    <script type="text/javascript" src="generatewallet.js"></script>
</head>

<body>
    
<a href="#" id="faqlink">FAQ</a>
<div id="faqbox">
Мануал Yuchcoin.<br>
<br>
Быстрый старт:<br>
1. Нажмите на "Создать кошелёк" около логотипа<br>
2. Введите приватный пароль и сохраните его.<br>
(этот пароль используется для подтверждения транзакций перевода)<br>
3. Нажмите "Подтвердить"<br>
(около надписи "ID новго кошелька:" появятся символы)<br>
4. Скопируйте ID нового кошелька и сохраните<br>
(этот ID является адресом кошелька для получения монет)<br>
5. Готово<br>
<br>
Майнинг: <br>
1. Введите ID кошелька в блоке "Мой кошелёк"<br>
(баланс кошелька обновляется каждые 15 секунд)<br>
2. Нажмите кнопку "Майнить"<br>
3. Готово!<br>
<br>
Отправка Ючкоинов:<br>
1. Введите ID своего кошелька<br>
2. Введите пароль от своего кошелька<br>
3. Введите ID кошелька куда собираетесь отправить коины<br>
4. Введите сумму<br>
5. Комиссия и доп.информация вводятся по желанию<br>
6. Нажмите "Подтвердить"<br>
7. Ожидайте перезагрузки страницы<br>
8. Готово.<br>
<br>
(Примечание.)<br>
1. На самом деле можно сохранить лишь пароль и каждый раз<br>
 с помощью него генерировать кошелёк так как его ID будет <br>
 одним и тем же.<br>
2. Желательно (очень желательно) придумать пароль посложнее. <br>
 Например: niuoi24f98h24mlokiw3f023lkmm.<br>
<br>
Made with love.<br>
</div>

<div id="mainlogo">
<img src="yuchcoinlogo.png" width="200px"></img>
</div>

<div id="content">


<a href="#" onclick="showcreate();">Создать кошелёк.</a>
<div id="newwall">

    <div id="generatedwallet"><br>
        <text>Сохраните эти данные у себя: </text><br><br>

        <text style="font-size: large;" >Придумайте приватный пароль (никому его не сообщайте):</text><br>

        <input type="text" id="newwalletkey" onkeyup="convert(this.id);" onchange="convert(this.id);"></input>

        <input type="button" id="submitmynewwalletkey" value="Подтвердить" onclick="generatewalletid();"></input><br><br>

        <text style="float: left; margin-right: 15px;">ID новго кошелька: </text>
        <text id="newwalletid"></text><br>
    </div>

</div>

<div class="line"></div>

<h3>Мой кошелёк</h3><br>
<div id="mywall">
    <text class="inputbox">ID кошелька:</text>
    <input type="text" id="mywalletid" onkeyup="convert(this.id);" onchange="convert(this.id);"></input>
</div>
<br><br>
<div id="mymoney" style="float: left;">
    <text style="float: left; margin-right: 10px;">Баланс:</text>
    <text id="mybalance" style="float: left; margin-right: 5px;">0</text>
    <text style="font-size: 15px;">YC</text>
</div>

<div id="oborot" style="float: left;">
    <text style="float: left; margin-right: 10px; margin-left: 100px;">В обращении:</text>
    <text id="theoborot" style="float: left; margin-right: 5px;">0</text>
    <text style="font-size: 15px;">YC</text>
</div>

<div id="blockhight">
    <text style="float: left; margin-right: 10px; margin-left: 100px;">Высота блокчейна:</text>
    <text id="theblockchain" style="float: left; margin-right: 5px;">0</text>
</div>

<div class="line"></div>


<h3>Майнер</h3><br>

<div id="minerblock" style="float: left;">

        <div id="myminer">

            <div id="userm">
                <input id="startbutton" type="button" value="Майнить" onclick="
            clearInterval(tim); tim = setInterval(() => {
                    mine();
                }, 1); console.log('Started.');  $('#iframeconsole').append('Started.<br>'); document.getElementById('iframeconsole').scrollTop = document.getElementById('iframeconsole').scrollHeight; showmine();"></input>
                <input id="stopbutton" type="button" value="Стоп" onclick="clearInterval(tim); unshowmine(); console.log('Stopped'); $('#iframeconsole').append('Stopped<br>'); document.getElementById('iframeconsole').scrollTop = document.getElementById('iframeconsole').scrollHeight;"></input>
            </div>

            <br>
            <text style="float: left; margin-right: 10px;">Решено транзакций:</text>
            <div id="sum">0</div>
        </div>
        <br>
        <text style="float: left; margin-right: 10px;">Текущее время:</text>
        <div id="clock">0</div>
        
</div>

<div id="iframeconsole"></div>

<br>
<div class="line"></div>

<div id="newtransaction">
    <h3>Отправить Ючкоины</h3><br>
    
<table>

    <tr>
        <th>
            <text class="inputbox">ID моего кошелька:</text>
        </th><th>
            <input type="text" id="mytransactionid" onkeyup="convert(this.id);" onchange="convert(this.id);"></input><br>
        </th>
    </tr><tr>
        <th>
            <text class="inputbox">Приватный ключ:</text>
        </th><th>
            <input type="text" id="mytransactionkey" onkeyup="convert(this.id);" onchange="convert(this.id);"></input><br>
        </th>
    </tr><tr>
        <th>
            <text class="inputbox">ID кошелька получателя:</text>
        </th><th>
            <input type="text" id="recievetransactionid" onkeyup="convert(this.id);" onchange="convert(this.id);"></input><br>
        </th>
    </tr>

</table>
<br>
<table>
    <tr>
        <th>
            <text class="inputbox">Сумма:</text>
        </th><th>
            <input type="text" id="recievedmoney" class="onlyDigits1" onkeyup="convert(this.id);" onchange="convert(this.id);"></input><br>
        </th>
    </tr><tr>
        <th>
            <text class="inputbox">Коммиссия (по желанию):</text>
        </th><th>
            <input type="text" id="commission" class="onlyDigits2" value="0" onkeyup="convert(this.id);" onchange="convert(this.id);"></input><br>
        </th>
    </tr>
    </tr><tr>
        <th>
            <text class="inputbox">Доп. информация (по желанию):</text>
        </th><th>
            <input type="text" id="addinformation" value="0" onkeyup="convert(this.id);" onchange="convert(this.id);"></input><br>
        </th>
    </tr>

</table>
    <br>
    <input type="button" id="submittransaction" value="Подтвердить" onclick="putunconfirmed();"></input>

</div>

<div class="line"></div>

<div id="mmm" style="display: none;"></div>
<div id="nnn" style="display: none;"></div>
<div id="vvv" style="display: none;"></div>

</div>

<script type="text/javascript" src="end.js"></script>


<br><br><br><br><br><br><br><br><br><br><br>
</body>