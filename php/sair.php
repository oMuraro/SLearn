<?php
session_start();
$_SESSION["usuario"] = "";
$_SESSION["senha"] = "";
header("Location:../");
exit();