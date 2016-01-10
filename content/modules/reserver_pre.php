<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Réserver un jeu";
  include_once("content/fonctions/membres.php");
  include_once("content/fonctions/jeux.php");

  $onPeutReserver = false;

  if ($getParamUn) {
    $idJeuAReserver = $getParamUn;
    $infosJeu = infosJeuDepuisId($idJeuAReserver);

    if (!$infosJeu) {
      $codeMessage = "jeuInvalide";
      $idJeuAReserver = false;
    }
    else {
      $listeResa = reservationsEnCoursMembre($pseudoMembre);
      $infosMembre = infosMembreDepuisPseudo($pseudoMembre);

      if ($infosMembre["fin_abo"] > (time() + ($settings["nbJoursReservation"] + 1)*24*3600)) {
        if (count($listeResa) < $settings["nbReservationsMax"]) {
          $nbExemplairesJeu = count(exemplairesDunJeu($idJeuAReserver));
          $nbReservNonFinies = nbReservationsJeuNonFinies($idJeuAReserver, $settings["nbJoursReservation"]);
          $nbPretsNonFinis = nbPretsEnCoursNonFinisJeu($idJeuAReserver, $settings["nbJoursReservation"]);
          if ($nbReservNonFinies + $nbPretsNonFinis < $nbExemplairesJeu) {
            // Ok, on peut réserver !
            $onPeutReserver = true;
          }
          else {
            // Erreur ! Pas assez de jeux pour répondre à la demande
            $codeMessage = "reserverNbReservMaxAtteintPourCeJeu";
          }
        }
        else {
          // Erreur ! Trop de réservations pour ce membre
          $codeMessage = "reserverNbReservAtteint";
        }
      }
      else {
        // Erreur ! Abo fini avant fin réservation
        $codeMessage = "reserverAboFiniAvantFinReserv";
      }
    }


  }
  else {
    $idJeuAReserver = false;
    $codeMessage = "pasDeParametre";
  }


  if ($actionPost == "resa" && $onPeutReserver) {
    if (isset($_POST["engagement"])) {
      $postEngage = intval($_POST["engagement"]);
    } else { $postEngage = false; }

    if ($postEngage) {
      // On enregistre la réservation !
      $sql = 'INSERT INTO  ludo_reservation (dateDebut, dateFin, dateEmprunt, pseudo, idJeu)  VALUES (:debut, :fin, NULL, :pseudo, :jeu);';
      $requete = $bd->prepare($sql);
      $requete->execute(array(':debut' => time(), ':fin' => time() + $settings["nbJoursReservation"]*24*3600 , ':pseudo' => $pseudoMembre, ':jeu' => $idJeuAReserver));
      $codeMessage = "reservationEnregistree";
    }
  }


?>
