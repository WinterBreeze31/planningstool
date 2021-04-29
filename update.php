<?php
    include_once('resources/logic.php');
?>
<?php

    $sql = "SELECT * FROM `games` WHERE `id`=".$_POST['planGameID'].";";
    $sth = $conn->prepare($sql);
    $sth->execute();
    $result = $sth->fetchall();

    $speltijd = [00, 0];
    $speltijd[1] = $result[0]['play_minutes'] + $result[0]['explain_minutes'];
    $spelduur = $result[0]['play_minutes'] + $result[0]['explain_minutes'];
    while ($speltijd[1] >= 60){
      $speltijd[1] -= 60;
      $speltijd[0]++;
    }


  $sql = "UPDATE `planned_games` 
  SET `starttijd` = '".$_POST['startTijd']."', `eindtijd` =  ADDTIME('".$_POST['startTijd']."', '".$speltijd[0].":".$speltijd[1]."'), `uitleggever` = '".$_POST['uitlegger']."', `spelers` = '".$_POST['spelers']."' WHERE `id` = '".$_POST['planID']."';";
  $sth = $conn->prepare($sql);
  $sth->execute();
?>
<html>
  <head>
    <title>planningstool</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href='css/style.css'>
  </head>
  <body>
  <?php
    include_once("resources/navbar.php");
  ?>


<div class="alert alert-warning" role="alert">
    <strong>Succes</strong> het spell is succesvol bewerkt. klik op de knop om terug te keren naar de home pagina.
    <a href="index.php"><button type="button" class="btn btn-warning">Homepage</button></a>
</div>


  
<script
			  src="https://code.jquery.com/jquery-3.6.0.js"
			  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			  crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>