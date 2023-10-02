<?php
#Zresetowanie Sesji
include('header.php');
session_unset();

#Przekierowanie na strone główną
header("Location: index.php");

?>