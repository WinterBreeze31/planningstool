<?php include_once('resources/logic.php'); ?>

<?php
    if(empty($_GET['id'])){
        $gameID = 6;
    } else {
        $gameID = $_GET['id'];
    };


    $sql = 'SELECT * FROM `planned_games` WHERE `id` = '.$gameID.';';
    $sth = $conn->prepare($sql);
    $sth->execute();
    $planInfo = $sth->fetchall();

    $sql = 'SELECT * FROM `games` WHERE `id` = '.$planInfo[0]['spel_id'].';';
    $sth = $conn->prepare($sql);
    $sth->execute();
    $gameList = $sth->fetchall();

    str_replace(" ", PHP_EOL, $planInfo[0]['speler']);
    $spelers = explode(PHP_EOL, $planInfo[0]['spelers']);

   

?>
 
<html>
  <head>
    <title>planningstool</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href='css/style.css'>
  </head>
  <body>

  <?php
    include_once("resources/navbar.php");
  ?>
<div class="card" style="width: 90%; margin: 0 auto;">
  <div class="card-body row">

  <div class="col-2">
      <ul class="list-group list-group-flush">
          <li class="list-group-item">min spelers: <br> <?php print_r($gameList[0]['min_players']); ?>
          </li>
          <li class="list-group-item">max spelers: <br> <?php print_r($gameList[0]['max_players']); ?>
          </li>
          <li class="list-group-item">speeltijd in minuten: <br> <?php print_r($gameList[0]['play_minutes']); ?>
          </li>
          <li class="list-group-item">uitleg tijd in minuten: <br> <?php print_r($gameList[0]['explain_minutes']); ?>
          </li>
      </ul>
    </div>

    <div class="col">
    <h4 class="card-title"><?php print_r($gameList[0]['name']); ?></h4>
    <a href="planned_games.php"><h6 class="card-subtitle mb-2 text-muted">Terug naar overzicht</h6></a>

    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Verwijder Afspraak
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body centered">
        <h2 class="title">Weet je zeker dat je deze afspraak wilt verwijderen?</h2>
        <form action="delete_game.php" method="post">
          <input type="hidden" name="game_id" value="<?php print_r($planInfo[0]['id']) ?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleren</button>
          <input type="submit" class="btn btn-danger" value="Verwijder deze afspraak">
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



   
    <br>
   
        <?php print_r($gameList[0]['description']); ?> 

   
    <br>
    <a href="<?php print_r($gameList[0]['url']) ?>" class="card-link">De website van het spel</a><br><br>
    </div>
    <div class="col-3">
        <img src="img/<?php print_r($gameList[0]['image']) ?>" alt="Card image" style="width: 150px; display: block; margin: 0 auto;">
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <?php print_r($gameList[0]['youtube']) ?>
    </div>
    <div class="col">
    <ul class="list-group list-group-flush">
            <li class="list-group-item">Dit spel is ingepland: <br> van: <?php print_r($planInfo[0]['starttijd']) ?> tot: <?php print_r($planInfo[0]['eindtijd']) ?>
          </li>
          <li class="list-group-item">Het spel word uitgelegd door: <br> <?php print_r($planInfo[0]['uitleggever']) ?> 
          </li>
          <li class="list-group-item">En gespeeld met: <br> <?php foreach($spelers as $val){  echo $val; ?> <br> <?php } ?>
          </li>
      </ul>
    </div> 
  </div>
</div>
<br>



<script
			  src="https://code.jquery.com/jquery-3.6.0.js"
			  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			  crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
