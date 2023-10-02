<?php
include('header.php');
session_unset();

// Przekieruj na stronę główną (lub inną stronę docelową po wylogowaniu)
header("Location: index.php"); // Możesz podać inną stronę docelową

?>