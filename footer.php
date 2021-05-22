<?php
if ( !isset($_SESSION['dCount']) ) {
$_SESSION['dCount'] =  $dCount;
}
$play = "0";
if ( $_SESSION['dCount'] !=  $dCount ) {
$_SESSION['dCount'] = $dCount;
$play = "1";
}
?>
<footer class="footer">
	<div class="col-lg-6">
		<div class="text-center" style="visibility: hidden;">
		<object type="application/x-shockwave-flash" data="./assets/audio/player_mp3_mini.swf" width="200" height="20">
		<param name="movie" value="./assets/audio/player_mp3_mini.swf" />
		<param name="bgcolor" value="#000000" />
		<param name="FlashVars" value="mp3=./assets/audio/alert.mp3&autoplay=<?php echo $play; ?>" />
		</object>
		</div>	
	</div>
	<div class="col-lg-6">
		<p class="text-center text-warning">Developed by<a target="_blank" href="#">Sitename</a> Title</p>
	</div>
</footer>
</body>
</html>