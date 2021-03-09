<?php

 session_start();

 /*destruction des variables user et error*/
 unset($_SESSION['user']);
 unset($_SESSION['error']);

/*redirection vers la page index*/
 header("Location:index.php");