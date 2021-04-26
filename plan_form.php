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

<br>
<div class="row">
    <form method="post" action="send.php" class="col-6 offset-3 color-4 border-round border-grey">
        <div class="form-group">
            <label for="startTime">Hoe laat beginnen jullie met spelen?</label>
            <input required type="time" name="startTijd" class="form-control color-5">
        </div>
        <div class="form-group">
            <label for="uitlegger">Wie gaat de uitleg geven?</label>
            <input required type="text" class="form-control color-5" name="uitlegger" pattern="[a-zA-Z0-9]+">
        </div>
        <div class="form-group">
            <label for="spelers">Wie gaan er spelen?</label>
            <textarea required  name="spelers" class="form-control color-5" style="height:200px; resize: none;" pattern="[a-zA-Z0-9]+"></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="planGameID" value="<?php echo $_GET['spel_id']; ?>">
            <input type="submit" class="form-control color-5" value="Plan in">
        </div>
    </form>
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