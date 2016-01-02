<?php

//
// CONNEXION BASE DE DONNEES
//
include('../settings.php');
/* CONTIENT :
  $bdName = "";
  $bdLogin = "";
  $bdPass = "";
  $bdHost = "";
*/

//
// PARAMETRES DE BASE
//
$settings = array();

/* Nombre de jours de prêts par défaut */
$settings["nbJoursPretsDefaut"] = 21 ;

/* Nombre de prêts max par personne (sauf admin : illimité, sauf extensions) */
$settings["maxPretsPersonne"] = 1 ;

?>
