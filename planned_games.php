<?php include_once('resources/logic.php'); ?>

<?php 
    $sql = 'SELECT * FROM `planned_games` WHERE 1 ORDER BY `starttijd`;';
    $sth = $conn->prepare($sql);
    $sth->execute();
    $infoList = $sth->fetchall();
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

        <?php foreach ($infoList as $val){
            $sql = "SELECT * FROM `games` WHERE `id` = ".$val['spel_id'].";";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $game = $sth->fetchall();

            ?>
                <div class="card">
                    <div class="card-body row">
                        <div class="col-10">
                            <h2 class="card-title"><?php print_r($game[0]['name']) ?></h2>
                            <p class="card-text"><i class="far fa-clock"></i> <?php print_r($val['starttijd']) ?> - <?php print_r($val['eindtijd']) ?></p>
                            <a href="game_page.php?id=<?php print_r($val['id']) ?>"><button type="button" class="btn btn-primary">bekijk deze afspraak</button></a>
                        </div> 
                        <img class="col" src="img/<?php print_r($game[0]['image']) ?>" alt="Card image">
                    </div>
                </div>

                <?php } ?>





<script
			  src="https://code.jquery.com/jquery-3.6.0.js"
			  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			  crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>