<?php
require_once("inc.config.php");

header("Content-Type: application/json");
echo json_encode($_FILES);
