<?php

require '../bootloader.php';

session_destroy();
header("location: /login.php");
