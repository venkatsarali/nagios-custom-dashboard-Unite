<?php 
session_start();
include('header.php');
include('config.php');
?>
<div class="container-fluid">
<div class="row">
<?php include('includes.php'); ?>
	<div class="col-sm-9">
	<!-- All results -->
<?php
foreach($nagiosurls as $key => $nagios){
	$allresults[$key] = getAllData($nagios[0],$nagios[1],$nagios[2]);
}

$dCount = 0;
$alerts['down'] = array();
$alerts['warn'] = array();
foreach($allresults as $nkey => $nData){	
	$sup = $sdown = $swarn = "0";
    if(!empty($nData)){	
		foreach($nData as $hostkey => $item){
			$up = $down = $warn = "0";
			foreach($item as $itemkey => $status ) {
				if($status == "2") {
					$up++;
				} elseif($status == "16") {
					$down++;
					$alerts['down'][$nkey][$hostkey][] = $itemkey;
				} else {
					$warn++;
					$alerts['warn'][$nkey][$hostkey][] = $itemkey;
				}
            } 
			if ( $up >= '1' ) { $sup++; }
			if ( $down >= '1') { $sdown++; }
			if ( $warn >= '1' ) { $swarn++; }
        }
    } else { 
		$swarn = "1"; 
	}
	$dCount = $dCount + $sdown;
		if ( $sdown >= '1') {
			$code = '<a class="danger blink ajax" href="./subpage.php?name='.$nkey.'&status=down"><span class="glyphicon glyphicon-remove-circle gly-spin"></span></a>';
        } elseif ( $swarn >= '1' ) {
			$code = '<a class="warning ajax" href="./subpage.php?name='.$nkey.'&status=warn"><span class="glyphicon glyphicon-exclamation-sign gly-spin"></span></a>';
        } else {
			$code = '<a class="success ajax" href="./subpage.php?name='.$nkey.'&status=up"><span class="glyphicon glyphicon-ok-circle gly-spin"></span></a>';
        }
?>
			<div class="col-sm-6">
				<div class="panel panel-info">
					<div class="panel-heading"><h3 class="panel-title"><strong><?php echo $nkey; ?></strong></h3></div>
				<div class="panel-body">
					<div class="text-center alerticon"><?php echo $code; ?></div>
					<p class="text-center">
					<a class="text-success ajax" href="./subpage.php?name=<?php echo $nkey; ?>&status=up">Success <span class="label label-success"><?php echo $sup; ?></span></a>
						<a class="text-warning ajax" href="./subpage.php?name=<?php echo $nkey; ?>&status=warn">Warning <span class="label label-warning"><?php echo $swarn; ?></span></a>
						<a class="text-danger ajax" href="./subpage.php?name=<?php echo $nkey; ?>&status=down">Critical <span class="label label-danger"><?php echo $sdown; ?></span></a>
					</p>
				</div>
				</div>
			</div>
<?php } ?>
	</div>

<!-- Sidebar-->
   <div class="col-sm-3">
	 <div class="col-sm-12">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title text-left"><strong>Alerts</strong>
				<span id="prev" class="tickerbtn glyphicon glyphicon-upload"></span>
				<span id="next" class="tickerbtn glyphicon glyphicon-download"></span></h3>
			</div>
                <div class="panel-body">
			      <div id="alerts">
			      <ul class="list-group" style="width:100%;">
<?php
if (is_array($alerts['down'])) {
	foreach($alerts['down'] as $index => $value ) {
		foreach( $value as $item => $checks ) {
			echo '<li class="list-group-item text-left text-danger">' . $index .': [<a class="text-danger ajax" href="./subpage.php?name='.$index.'&status='.$item.'"><strong>'.$item.'</strong></a>] => ';
			foreach( $checks as $id ) {
				echo $id .", ";
			}
			echo "</li>";
		}
	}
}

if (is_array($alerts['warn'])) {
	foreach($alerts['warn'] as $index => $value ) {
		foreach( $value as $item => $checks ) {
			echo '<li class="list-group-item text-left text-warning">' . $index .': [<a class="text-warning ajax" href="./subpage.php?name='.$index.'&status='.$item.'"><strong>'.$item.'</strong></a>] => ';
			foreach( $checks as $id ) {
				echo $id .", ";
			}
			echo "</li>";
		}
	}
}
?>
				</ul>
				</div>
			 </div>
           </div>
        </div>
	</div>
<!-- Sidebar-->
</div>
</div>
<?php include('footer.php'); ?>