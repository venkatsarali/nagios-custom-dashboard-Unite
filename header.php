<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="90" />
  <title> Unite Nagios Monitoring Dashboard </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/style.css" rel="stylesheet">
<link href="assets/colorbox.css" rel="stylesheet">

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.colorbox-min.js"></script>
<script src="assets/js/jquery.vticker.min.js"></script>
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<script type="text/javascript">
$(document).ready(function(){
  function blink(selector){
  $(selector).fadeOut('fast', function(){
      $(this).fadeIn('slow', function(){
          blink(this);
      });
  });
  }
  blink('.blink');
  // scroller
  $(function() {
  $('#alerts').vTicker('init', {speed: 400, 
      pause: 1000,
      showItems: 8,
      height: 700,
      animation: 'fade',
      padding:4});
  //next	
  $('#next').click(function() { 
      $('#alerts').vTicker('next', {animate:true});
    });
  //prev  
  $('#prev').click(function() { 
      $('#alerts').vTicker('prev', {animate:true});
    });  
  
  });
  
  // for lightbox
  if (screen && screen.width > 480) {
  	$(".ajax").colorbox({width:"80%", height:"80%"});
  }
});
</script>
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header"><img class="sitelogo" src="./assets/images/logo.jpg"><a class="sitetitle" href="">Unite Monitoring Dashboard</a></div>
      </div>
    </nav>
