<?php

session_start();
sleep(5);

echo "processado: " . date('Y-m-d H:i:s') . ": " . microtime(true);