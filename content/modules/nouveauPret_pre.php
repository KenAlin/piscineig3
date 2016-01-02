<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Nouveau prêt";
  include_once("content/fonctions/membres.php");

  // CONTEXTE :
  //    0 : Simple formulaire de saisie de code barre ("init")
  //    1 : Saisie du pseudo de l'emprunteur
  //    2 : Saisie de la date de retour prévue
  $contexte = 0;

  // Initialisations diverses
  $infosJeu = null;
  $infosEx = null;
  $dejaEnPret = false;
  $infosUser = null;

  if ($actionPost == "shop") {
    // Vérifier que le CB est valide
    if (isset($_POST["code_barre"])) {
      $postCB = trim(htmlentities($_POST["code_barre"]));
    } else { $postCB = false; }

    if ($postCB) {
      $sql = 'SELECT * FROM ludo_exemplaires WHERE code_barre=:cb;';
      $requete = $bd->prepare($sql);
      $requete->bindValue(':cb', $postCB, PDO::PARAM_INT);
      $requete->execute();
      $result = $requete->fetchAll(PDO::FETCH_ASSOC);

      if (isset($result[0])) {
        $infosEx = $result[0];
        $contexte = 1;

        $sql = 'SELECT * FROM ludo_emprunts WHERE idExemplaire=:idex AND dateRetour IS NULL;';
        $requete = $bd->prepare($sql);
        $requete->bindValue(':idex', $postCB, PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetchAll(PDO::FETCH_ASSOC);

        if (isset($result[0])) {
          // Oops ! Cet exemplaire est déjà en emprunté ?!
          $codeMessage = "pretCBdejaEnPret";
          $dejaEnPret = true;
        }

        // On cherche les infos du jeu
        $sql = 'SELECT * FROM ludo_jeux WHERE id=:id;';
        $requete = $bd->prepare($sql);
        $requete->bindValue(':id', $infosEx["idJeu"], PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetchAll(PDO::FETCH_ASSOC);
        $infosJeu = $result[0];
      }
      else {
        // Erreur : CB inexistant
        $codeMessage = "pretCBinexistant";
      }
    }
    else {
      // Erreur : CB invalide
      $codeMessage = "formIncomplet";
    }
  }

  if ($contexte == 1) {
    // Vérifier que le pseudo saisi est valide ... on y sera pas quand on n'a fait que saisir le CB
    if (isset($_POST["pseudo"])) {
      $postPseudo = trim(htmlentities($_POST["pseudo"]));
    } else { $postPseudo = false; }
    if (isset($_POST["forcePret"])) {
      $postForcePret = intval($_POST["forcePret"]);
    } else { $postForcePret = false; }

    if ($postPseudo) {
      // On cherche les infos du membre
      $infosUser = infosMembreDepuisPseudo($postPseudo);

      if ($infosUser) {
        // Autorisé à emprunter :
        //    soit estAdmin
        //    soit adhésion encore valable && (soit pretsEnCours < pretsMax / soit tentative d'emprunt d'une extension d'un   jeu déjà en cours d'emprunt)
        //    soit forçage
        if ($infosUser["estAdmin"] || $postForcePret) {
          $contexte = 2;
        }
        else {
          // Les ennuis commencent ! On vérifie les deux conditions :
          //    l'adhésion est encore valable
          //    pretsEnCours < pretsMax OU tentative d'emprunt d'une extension d'un jeu déjà en cours d'emprunt
          if ($infosUser["fin_abo"] > time()) {
            if (nbPretsEnCoursMembre($postPseudo) < $settings["maxPretsPersonne"]) {
              // Fine ! C'est OK !
              $contexte = 2;
            }
            else {

            }

          }
          else {
            // Erreur ! L'adhésion n'est plus valable :(
            $codeMessage = "pretCBfinAbo";
          }
        }

      }
      else {
        // Erreur : pseudo ne correspondant à personne !!
        $codeMessage = "pretCBpseudoIntrouvable";
      }
    }
  }

?>
