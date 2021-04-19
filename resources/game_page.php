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
    <a href="#"><h6 class="card-subtitle mb-2 text-muted">Terug naar overzicht</h6></a>
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



