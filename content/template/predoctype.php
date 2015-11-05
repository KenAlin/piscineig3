<?php
  session_start();

  if (isset($_SESSION['estEnLigne'])) {
    $estConnecte = $_SESSION['estEnLigne'];
  }
  else {
    $estConnecte = false;
  }

  if (isset($_SESSION['estAdmin'])) {
    $estAdmin = $_SESSION['estAdmin'];
  }
  else {
    $estAdmin = false;
  }

?>
