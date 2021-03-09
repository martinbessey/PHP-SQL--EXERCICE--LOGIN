<?php

 session_start();

 /*destruction des vaiables user et error*/
 unset($_SESSION['user']);
 unset($_SESSION['error']);

/*redirection vers la page index*/
 header("Location:index.php");