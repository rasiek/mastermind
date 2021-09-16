
<?php
require_once('../Mastermind.php');
session_start();


$prop = $_SESSION['game']->test($_REQUEST['try']);

header('Content-Type: application/json');

http_response_code(200);

echo json_encode($prop);

?>