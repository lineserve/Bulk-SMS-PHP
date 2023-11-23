<?php

require('bulksms.php');
$token = "12|TILcnp2WYZmdv470ZJQuMQs1Sl4X08SdbSbfl70m";
$roycebulksms = new RoyceBulksmsGateway;
$roycebulksms->sendSMS('0713727937', "hello from vanilla php", 'RoyceLtd', $token);
