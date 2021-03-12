<?php
require_once './vendor/autoload.php';

use whikloj\fedoraStompPhp\FedoraStomp;

$stomp = new FedoraStomp('tcp://localhost:61613', '/topic/fedora');
$stomp->listen();
print "Done";