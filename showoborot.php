<?php
//sender
$showsqlsender = new mysqli ("localhost", "root", "", "blockchain");
$showsqlsender->query("SET NAMES 'utf8'");

$sqllistsender = $showsqlsender->query("SELECT `Sender` FROM `confirmed`");

//solvedw
$sum = 0;
//-------------------
while (($rowsender = mysqli_fetch_row($sqllistsender))){


        for ($j = 0 ; $j < 1 ; ++$j){

            $locallistcost = $rowcost[$j];
            $locallistrecipient = $rowrecipient[$j];
            $locallistsolvedw = $rowsolvedw[$j];
            $locallistsender = $rowsender[$j];

            $sum = $sum + 0.00032;
        } 
}

echo $sum;

$showsqlsender->close();
//---------------------

?>