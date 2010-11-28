<div class="buttonbar">

<div class="mod embed_movie font">
<a class="buttonlink">Embed</a>
<form>
<textarea rows="5" cols="20"><iframe src="<?php echo site_url('embed/' . $movie); ?>" width="" height="" frameborder="0" align="left" scrolling="no"></iframe></textarea>
</form>
</div>

<div class="mod add_animation font">
<a class="buttonlink">Upload movie</a>
<form action="" method="post" enctype="multipart/form-data">
<p><label>Movie:</label><input type="file" name="movie" /></p>
<p><input type="submit" class="button" name="submit" value="Upload my movie!" /></p>
</form>
</div>

</div>

