
<br>
<div class="row">
    <form action="pages/test.php" method="post" class="col-6 offset-3 color-4 border-round border-grey">
        <br>
        <div class="form-group">
            <label for="startTime">Hoe laat beginnen jullie met spelen?</label>
            <input type="time" name="startTijd" class="form-control color-5">
        </div>
        <div class="form-group">
            <label for="uitlegger">Wie gaat de uitleg geven?</label>
            <input type="text" class="form-control color-5" name="uitlegger">
        </div>
        <div class="form-group">
            <label for="spelers">Wie gaan er spelen?</label>
            <textarea name="spelers" class="form-control color-5" style="height:200px; resize: none;">
            </textarea>
        </div>
        <br>
        <div class="form-group">
            <input type="hidden" name="planGameID" value="2">
            <input type="submit" class="form-control color-5" value="Plan in">
        </div>
        <br>
    </form>
</div>