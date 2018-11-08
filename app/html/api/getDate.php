<?php
$date = new DateTime();
echo json_encode(['date' => $date->format('Y-m-d H:i:s')]);
