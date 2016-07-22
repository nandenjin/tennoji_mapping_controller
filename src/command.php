<?php
$c['cmd']=$_GET['cmd'];
$c['id']=$_GET['id'];
file_put_contents("cmd.oda",json_encode($c));
echo '[OK]'.$c['cmd'].' - '.$c['id'];
?>