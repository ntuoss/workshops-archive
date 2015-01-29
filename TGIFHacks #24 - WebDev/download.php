<?php

$IPADDRESS = 'localhost';

$manual = isset($_POST['manual']) ? $_POST['manual'] === 'true' ? 'true' : 'false' : 'false';
$sourcecode = isset($_POST['sourcecode']) ? $_POST['sourcecode'] === 'true' ? 'true' : 'false' : 'false';
$bootstrap = isset($_POST['bootstrap']) ? $_POST['bootstrap'] === 'true' ? 'true' : 'false' : 'false';
$jquery = isset($_POST['jquery']) ? $_POST['jquery'] === 'true' ? 'true' : 'false' : 'false';

header("Location: http://$IPADDRESS/get.php?" . http_build_query(
    array(
        'manual' => $manual,
        'sourcecode' => $sourcecode,
        'bootstrap' => $bootstrap,
        'jquery' => $jquery
    )
));