<?php
$lnk = mysqli_connect("localhost", "root", "", "reg_auth") or die ('Cannot connect to server');
mysqli_select_db($lnk, "reg_auth") or die('Cannot open database');
mysqli_set_charset($lnk, 'utf8');
