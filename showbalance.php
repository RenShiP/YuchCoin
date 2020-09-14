<?php

$wallet = $_POST['uwallet'];

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

            if($locallistsolvedw == $wallet){
                $sum = $sum + 0.00032;
            }

            if($locallistrecipient == $wallet){
                $sum = $sum + $locallistcost;
            }
            
            if($locallistsender == $wallet){
                $sum = $sum - $locallistcost;
            }

        } 
}

echo $sum;

$showsqlrecipient->close();
$showsqlcost->close();
$showsqlsolvedw->close();
//---------------------

?>