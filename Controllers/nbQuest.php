<?php
session_start();
$_SESSION['nbQuestion']++;
echo $_SESSION['nbQuestion'];
