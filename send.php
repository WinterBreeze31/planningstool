<?php
    include_once('resources/logic.php');
?>
<?php

    $sql = "SELECT * FROM `games` WHERE `id`=".$_POST['planGameID'].";";
    $sth = $conn->prepare($sql);
    $sth->execute();
    $result = $sth->fetchall();

    $speltijd = $result[0]['play_minutes'] + $result[0]['explain_minutes'];
    $spelduur = [0, 0];
    $spelduur[1] = $speltijd;
    $startTijd = explode(":", $_POST['startTijd']);
    $eindTijd = [0, 0];


    while ($spelduur[1] >= 60){
        $spelduur[1] -= 60;
        $spelduur[0]++;
    }
    
    
  $eindTijd[1] = $startTijd[1] + $spelduur[1];
  while ($eindTijd[1] >= 60){
    $eindTijd[1] -= 60;
    $eindTijd[0]++;
  }


  $eindTijd[0] = $startTijd[0] + $spelduur[0];
  while ($eindTijd[0] >= 24){
    $eindTijd[0] -= 24;
  }


  $sql = "INSERT INTO `planned_games` (`id`, `spel_id`, `starttijd`, `eindtijd`, `spelduur`, `uitleggever`, `spelers`) VALUES (NULL, '".$_POST['planGameID']."', '".$startTijd[0].$startTijd[1]."', '".$eindTijd[0].$eindTijd[1]."', '".$speltijd."', '".$_POST['uitlegger']."', '".$_POST['spelers']."');";
  $sth = $conn->prepare($sql);
  $sth->execute();
?>
