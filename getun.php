<?php

$wallet = $_POST['uwallet'];

//Number
$showsqlNumber = new mysqli ("localhost", "root", "", "blockchain");
$showsqlNumber->query("SET NAMES 'utf8'");

$sqllistNumber = $showsqlNumber->query("SELECT `Number` FROM `unconfirmed`");

//Sender
$showsqlSender = new mysqli ("localhost", "root", "", "blockchain");
$showsqlSender->query("SET NAMES 'utf8'");

$sqllistSender = $showsqlSender->query("SELECT `Sender` FROM `unconfirmed`");

//Recipient
$showsqlRecipient = new mysqli ("localhost", "root", "", "blockchain");
$showsqlRecipient->query("SET NAMES 'utf8'");

$sqllistRecipient = $showsqlRecipient->query("SELECT `Recipient` FROM `unconfirmed`");

//Cost
$showsqlCost = new mysqli ("localhost", "root", "", "blockchain");
$showsqlCost->query("SET NAMES 'utf8'");

$sqllistCost = $showsqlCost->query("SELECT `Cost` FROM `unconfirmed`");

//EDS
$showsqlEDS = new mysqli ("localhost", "root", "", "blockchain");
$showsqlEDS->query("SET NAMES 'utf8'");

$sqllistEDS = $showsqlEDS->query("SELECT `EDS` FROM `unconfirmed`");

//Commission
$showsqlCommission = new mysqli ("localhost", "root", "", "blockchain");
$showsqlCommission->query("SET NAMES 'utf8'");

$sqllistCommission = $showsqlCommission->query("SELECT `Commission` FROM `unconfirmed`");

//Information
$showsqlInformation = new mysqli ("localhost", "root", "", "blockchain");
$showsqlInformation->query("SET NAMES 'utf8'");

$sqllistInformation = $showsqlInformation->query("SELECT `Information` FROM `unconfirmed`");

//solvedw
$sum = 0;
//-------------------
while (($rowNumber = mysqli_fetch_row($sqllistNumber)) && ($rowSender = mysqli_fetch_row($sqllistSender)) && ($rowRecipient = mysqli_fetch_row($sqllistRecipient)) && ($rowCost = mysqli_fetch_row($sqllistCost)) && ($rowEDS = mysqli_fetch_row($sqllistEDS)) && ($rowCommission = mysqli_fetch_row($sqllistCommission)) && ($rowInformation = mysqli_fetch_row($sqllistInformation))) {

        for ($j = 0 ; $j < 1 ; ++$j){

            $locallistNumber = $rowNumber[$j];
            $locallistSender = $rowSender[$j];
            $locallistRecipient = $rowRecipient[$j];
            $locallistCost = $rowCost[$j];
            $locallistEDS = $rowEDS[$j];
            $locallistCommission = $rowCommission[$j];
            $locallistInformation = $rowInformation[$j];

            $output = "<script>";
            
            $output .= 'var localnumber = "';
            $output .= $locallistNumber;
            $output .= '";';

            $output .= 'var localSender = "';
            $output .= $locallistSender;
            $output .= '";';

            $output .= 'var localRecipient = "';
            $output .= $locallistRecipient;
            $output .= '";';

            $output .= 'var localCost = "';
            $output .= $locallistCost;
            $output .= '";';

            $output .= 'var localEDS = "';
            $output .= $locallistEDS;
            $output .= '";';

            $output .= 'var localCommission = "';
            $output .= $locallistCommission;
            $output .= '";';

            $output .= 'var localInformation = "';
            $output .= $locallistInformation;
            $output .= '";';

            //$output .= "location.reload();";

            $output .= "</script>";
        } 
}
echo $output;

$showsqlNumber->close();
$showsqlSender->close();
$showsqlRecipient->close();
$showsqlCost->close();
$showsqlEDS->close();
$showsqlCommission->close();
$showsqlInformation->close();

?>