<?php
    include_once('resources/logic.php');
?>
<?php 
    $_POST['game_id'] = preg_replace( '/[^0-9]/', '', $_POST['game_id']);

    if ( empty($_POST['game_id']) ){
        ?> nee <?php
        die();
    }

    $sql = "DELETE FROM `planned_games` WHERE `id`=".$_POST['game_id'].";";
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


    
<div class="alert alert-secondary" role="alert">
    <strong>Verwijderd</strong> deze afspraak is verwijderd. klik op de knop om terug te keren naar de home pagina.
    <br>
    <a href="index.php"><button type="button" class="btn btn-secondary">Homepage</button></a>
</div>