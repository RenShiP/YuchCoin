<?php
    $mywallet = $_POST[mywallet1];
    $eds = $_POST[eds1];
    $recieve = $_POST[recieve1];
    $cost = $_POST[cost1];
    $thecommission = $_POST[thecommission1];
    $theinformation = $_POST[information1];

//sender
$showsqlsender = new mysqli ("localhost", "root", "", "blockchain");
$showsqlsender->query("SET NAMES 'utf8'");

$sqllistsender = $showsqlsender->query("SELECT `Sender` FROM `confirmed`");

//recipient
$showsqlrecipient = new mysqli ("localhost", "root", "", "blockchain");
$showsqlrecipient->query("SET NAMES 'utf8'");

$sqllistrecipient = $showsqlrecipient->query("SELECT `Recipient` FROM `confirmed`");

//list cost
$showsqlcost = new mysqli ("localhost", "root", "", "blockchain");
$showsqlcost->query("SET NAMES 'utf8'");

$sqllistcost = $showsqlcost->query("SELECT `Cost` FROM `confirmed`");

//list solvedw
$showsqlsolvedw = new mysqli ("localhost", "root", "", "blockchain");
$showsqlsolvedw->query("SET NAMES 'utf8'");

$sqllistsolvedw = $showsqlsolvedw->query("SELECT `WalletSolved` FROM `confirmed`");

//solvedw
$sum = 0;
//-------------------
while (($rowsender = mysqli_fetch_row($sqllistsender)) && ($rowsolvedw = mysqli_fetch_row($sqllistsolvedw)) && ($rowrecipient = mysqli_fetch_row($sqllistrecipient)) && ($rowcost = mysqli_fetch_row($sqllistcost))) {


        for ($j = 0 ; $j < 1 ; ++$j){

            $locallistcost = $rowcost[$j];
            $locallistrecipient = $rowrecipient[$j];
            $locallistsolvedw = $rowsolvedw[$j];
            $locallistsender = $rowsender[$j];

            if($locallistsolvedw == $mywallet){
                $sum = $sum + 0.00032;
            }

            if($locallistrecipient == $mywallet){
                $sum = $sum + $locallistcost;
            }
            
            if($locallistsender == $mywallet){
                $sum = $sum - $locallistcost;
            }

        } 
}

$showsqlrecipient->close();
$showsqlcost->close();
$showsqlsolvedw->close();
$showsqlsender->close();
//---------------------
//------------------------------------------------------------

//Sender
$showsqlSender = new mysqli ("localhost", "root", "", "blockchain");
$showsqlSender->query("SET NAMES 'utf8'");

$sqllistSender = $showsqlSender->query("SELECT `Sender` FROM `unconfirmed`");

//Cost
$showsqlCost = new mysqli ("localhost", "root", "", "blockchain");
$showsqlCost->query("SET NAMES 'utf8'");

$sqllistCost = $showsqlCost->query("SELECT `Cost` FROM `unconfirmed`");

//Commission
$showsqlCommission = new mysqli ("localhost", "root", "", "blockchain");
$showsqlCommission->query("SET NAMES 'utf8'");

$sqllistCommission = $showsqlCommission->query("SELECT `Commission` FROM `unconfirmed`");

//solvedw
$unsum = 0;
//-------------------
while ( ($rowSender = mysqli_fetch_row($sqllistSender)) && ($rowCost = mysqli_fetch_row($sqllistCost)) && ($rowCommission = mysqli_fetch_row($sqllistCommission)) ){

        for ($j = 0 ; $j < 1 ; ++$j){

            $locallistSender = $rowSender[$j];
            $locallistCost = $rowCost[$j];
            $locallistCommission = $rowCommission[$j];

            if($locallistSender == $mywallet){
                $unsum = $unsum - $locallistСost - $locallistCommission;
            }
        } 
}

$showsqlSender->close();
$showsqlCost->close();
$showsqlCommission->close();


//------------------------------------------------------------
$thesumma = 0;
$thesumma = $sum - (int)$cost - (int)$thecommission - $unsum;

if( ((int)$sum < (int)$thesumma) or ((int)$thesumma < 0) or ((int)$unsum < 0)) {
    echo '<script>alert("Недостаточно средств.");</script>';
} else {
    $mysqli = new mysqli ("localhost", "root", "", "blockchain");
    $mysqli->query("SET NAMES 'utf8'");
    
    $mysqli->query("INSERT INTO `blockchain`.`unconfirmed` (`Number`, `Sender`, `Recipient`, `Cost`, `EDS`, `Commission`, `Information`) VALUES (NULL, '$mywallet', '$recieve', '$cost', '$eds', '$thecommission', '$theinformation');");

    $mysqli->close();

    echo '<script>location.reload();</script>';
}
?>