<?php
include('config.php');
include('includes.php');

if(isset($_GET["name"]) && isset($_GET["status"])){
        $nagios = $nagiosurls[$_GET["name"]];

        if($_GET["status"] == "up" ){
                $results = getOk($nagios[0],$nagios[1],$nagios[2]);

        } elseif($_GET["status"] == "warn" ){
                $results = getWarning($nagios[0],$nagios[1],$nagios[2]);

        } elseif($_GET["status"] == "down" ){
                $results = getCritical($nagios[0],$nagios[1],$nagios[2]);

        } else {
                $results = getHost($_GET["status"],$nagios[0],$nagios[1],$nagios[2]);

        }
?>
<div class="panel">
<div class="panel-body">
<table class="table table-striped table-condensed">
    <thead>
      <tr>
        <th>Host</th>
        <th>Service</th>
                <th>Status</th>
                <th>Duration</th>
        <th>Status Information</th>
      </tr>
    </thead>
    <tbody>
<?php
        if(!empty($results)) {
                foreach($results as $hkey => $item) {
                if(!empty($item)){
                        foreach($item as $ikey => $service) {
                        if($service['status'] == 2) {
                                $status = "<div class='label label-success'> OK </div>";
                        } elseif($service['status'] == 16) {
                                $status = "<span class='label label-danger'>CRITICAL</span>";
                        } else {
                                $status = "<span class='label label-warning'>WARNING</span>";
                        }
                                $state_change = time2string($service['last_state_change']);
                                echo '<tr><td><a href="'.$nagios[0].'/cgi-bin/status.cgi?host='.$hkey.'" target="_blank">'.$hkey.'</a></td><td>'.$ikey.'</td><td>'.$status.'</td><td>'.$state_change.'</td><td>'.$service['plugin_output'].'</td></tr>'."\n";
                        }
                } else { echo "No data"; }
                }
        } else { echo "No data"; }
?>
    </tbody>
  </table>
  </div>
</div>
<?php
} else {
        echo "API Error";
}
?>