<?php

$wallet = $_POST['uwallet'];

//Number
$showsqlNumber = new mysqli ("localhost", "root", "", "blockchain");
$showsqlNumber->query("SET NAMES 'utf8'");

$sqllistNumber = $showsqlNumber->query("SELECT `Number` FROM `confirmed`");

//Sender
$showsqlSender = new mysqli ("localhost", "root", "", "blockchain");
$showsqlSender->query("SET NAMES 'utf8'");

$sqllistSender = $showsqlSender->query("SELECT `Sender` FROM `confirmed`");

//Recipient
$showsqlRecipient = new mysqli ("localhost", "root", "", "blockchain");
$showsqlRecipient->query("SET NAMES 'utf8'");

$sqllistRecipient = $showsqlRecipient->query("SELECT `Recipient` FROM `confirmed`");

//Cost
$showsqlCost = new mysqli ("localhost", "root", "", "blockchain");
$showsqlCost->query("SET NAMES 'utf8'");

$sqllistCost = $showsqlCost->query("SELECT `Cost` FROM `confirmed`");

//PrevHash
$showsqlPrevHash = new mysqli ("localhost", "root", "", "blockchain");
$showsqlPrevHash->query("SET NAMES 'utf8'");

$sqllistPrevHash = $showsqlPrevHash->query("SELECT `PrevHash` FROM `confirmed`");

//solvedw
$sum = 0;
//-------------------
while (($rowNumber = mysqli_fetch_row($sqllistNumber)) && ($rowPrevHash = mysqli_fetch_row($sqllistPrevHash)) && ($rowSender = mysqli_fetch_row($sqllistSender)) && ($rowRecipient = mysqli_fetch_row($sqllistRecipient)) && ($rowCost = mysqli_fetch_row($sqllistCost))) {

        for ($j = 0 ; $j < 1 ; ++$j){

            $locallistSender = $rowSender[$j];
            $locallistRecipient = $rowRecipient[$j];
            $locallistCost = $rowCost[$j];
            $locallistPrevHash = $rowPrevHash[$j];
            $locallistNumber = $rowNumber[$j];

            $output = "<script>";

            $output .= 'var blocalSender = "';
            $output .= $locallistSender;
            $output .= '";';

            $output .= 'var blocalRecipient = "';
            $output .= $locallistRecipient;
            $output .= '";';

            $output .= 'var blocalCost = "';
            $output .= $locallistCost;
            $output .= '";';
            
            $output .= 'var blocalHash = "';
            $output .= $locallistPrevHash;
            $output .= '";';
            
            $output .= 'var blocalNumber = "';
            $output .= $locallistNumber;
            $output .= '";';

            $output .= "</script>";
        } 
}
echo $output;

$showsqlNumber->close();
$showsqlSender->close();
$showsqlRecipient->close();
$showsqlCost->close();

?>