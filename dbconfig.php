<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\auth;

$factory = (new Factory)
    ->withServiceAccount('mondayapp-2fcbf-firebase-adminsdk-og0t4-8a2b6886dc.json')
    ->withDatabaseUri('https://mondayapp-2fcbf-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();

?>