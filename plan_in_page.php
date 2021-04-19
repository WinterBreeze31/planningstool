<?php include_once('resources/logic.php'); ?>

<?php 
    $sql = 'SELECT * FROM `games` WHERE 1 ORDER BY `name`;';
    $sth = $conn->prepare($sql);
    $sth->execute();
    $gameList = $sth->fetchall();
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

  <?php
    foreach($gameList as $val){ ?>
    <div class="card">
        <div class="card-body row">
            <img class="col" src="img/<?php print_r($val['image']) ?>" alt="Card image">
            <div class="col-10">
                <h2 class="card-title"><?php print_r($val['name']) ?></h2>
                <p class="card-text"><?php print_r($val['description']) ?></p>
                <p class="card-text"><i class="fas fa-users"></i> <?php print_r($val['min_players']) ?> - <?php print_r($val['max_players']) ?></p>
                <p class="card-text"><i class="far fa-clock"></i> <?php print_r($val['play_minutes']) ?> min</p>
                <a href="plan_form.php?spel_id=<?php print_r($val['id']) ?>"><button type="button" class="btn btn-primary">plan dit spel in</button></a>
            </div>
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