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

  /* Nombre de jours de prêts par défaut, peut être changé au cas-par-cas */
  $settings["nbJoursPretsDefaut"] = 21 ;

  /* Nombre de jours de prêts au maximum */
  $settings["nbJoursMaxPrets"] = 90 ;

  /* Nombre de prêts max par personne (sauf admin : illimité, sauf extensions) */
  $settings["maxPretsPersonne"] = 1 ;

  /* Nombre de jours pour la réservation (défaut : 14) */
  $settings["nbJoursReservation"] = 14;

  /* Nombre de réservations maximales par membre (défaut : 1) */
  $settings["nbReservationsMax"] = 1;

?>
