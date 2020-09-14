<?php
    $mywallet = $_POST[mywallet1];
    $eds = $_POST[eds1];
    $resipient = $_POST[resipient1];
    $cost = $_POST[cost1];
    $thecommission = $_POST[thecommission1];

    $theinformation = $_POST[information1];

    $rhash = $_POST[rhash1];
    $rnum = $_POST[rnum1];
    $prevhash = $_POST[prevhash1];
    $bnum = $_POST[bnum1];
    $sender = $_POST[sender1];

    $unum = $_POST[unum1];

    $sum = 0;
    //Number
    $showsqlNumber = new mysqli ("localhost", "root", "", "blockchain");
    $showsqlNumber->query("SET NAMES 'utf8'");

    $sqllistNumber = $showsqlNumber->query("SELECT `Number` FROM `confirmed`");
    
//-------------------
while (($rowNumber = mysqli_fetch_row($sqllistNumber))) {

        for ($j = 0 ; $j < 1 ; ++$j){

            $locallistNumber = $rowNumber[$j];
            $sum = $locallistNumber;

        } 
}

$showsqlNumber->close();

if($sum == $bnum) {

    $mysqli = new mysqli ("localhost", "root", "", "blockchain");
    $mysqli->query("SET NAMES 'utf8'");
    $mysqli->query("DELETE FROM `blockchain`.`unconfirmed` WHERE `unconfirmed`.`Number` = $unum;");
    $mysqli->close();

    $mysqli = new mysqli ("localhost", "root", "", "blockchain");
    $mysqli->query("SET NAMES 'utf8'");
    
    $mysqli->query("INSERT INTO `blockchain`.`confirmed` 
    (`Number`, `Sender`, `Recipient`, `Cost`, `Commission`, `Information`, `EDS`, `PrevHash`, `WalletSolved`, `RandomNum`, `RandomHash` ) VALUES 
    (NULL, '$sender', '$resipient', '$cost', '$thecommission', '$theinformation', '$eds', '$prevhash', '$mywallet', '$rnum', '$rhash');");

    $mysqli->close();

}

//--------------------------------------

$sum = 0;
//Number
$showsqlNumber = new mysqli ("localhost", "root", "", "blockchain");
$showsqlNumber->query("SET NAMES 'utf8'");

$sqllistNumber = $showsqlNumber->query("SELECT `Number` FROM `unconfirmed`");

while (($rowNumber = mysqli_fetch_row($sqllistNumber))) {

    for ($j = 0 ; $j < 1 ; ++$j){

        $sum = $sum + 1;
    } 
}

$showsqlNumber->close();

$theinformation = "Miner transaction...";

if ($sum == 0) {
    $mysqli = new mysqli ("localhost", "root", "", "blockchain");
    $mysqli->query("SET NAMES 'utf8'");
    
    $mysqli->query("INSERT INTO `blockchain`.`unconfirmed` (`Number`, `Sender`, `Recipient`, `Cost`, `EDS`, `Commission`, `Information`) VALUES (NULL, '$mywallet', '$mywallet', '0', '0', '0', '$theinformation');");

    $mysqli->close();
}
?>