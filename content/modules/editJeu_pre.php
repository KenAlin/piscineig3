<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Modifier la fiche d'un jeu";
  include_once("content/fonctions/jeux.php");

  if ($getParamUn) {
    $jeuDemande = intval($getParamUn);

    // On va obtenir la liste des catégories
    $listeCategories = listeCategories();

    // Traitement si on a modifié la fiche
    if ($actionPost == "edit") {
      // On arrive depuis le formulaire : on va sécuriser quelques données ...
      if (isset($_POST["annee"])) {
        $postAnnee = trim(htmlentities($_POST["annee"]));
      } else { $postAnnee = false; }
      if (isset($_POST["editeur"])) {
        $postEditeur = trim(htmlentities($_POST["editeur"]));
      } else { $postEditeur = false; }
      if (isset($_POST["age"])) {
        $postAge = trim(htmlentities($_POST["age"]));
      } else { $postAge = false; }
      if (isset($_POST["nbjoueurs"])) {
        $postNbJ = trim(htmlentities($_POST["nbjoueurs"]));
      } else { $postNbJ = false; }
      if (isset($_POST["desc"])) {
        $postDesc = trim(htmlentities($_POST["desc"]));
      } else { $postDesc = false; }
      if (isset($_POST["categorie"])) {
        $postCat = trim(htmlentities($_POST["categorie"]));
      } else { $postCat = 0; }

      // Gogo ! On va modifier les infos (on écrase, on écrit par dessus)
      $sql = 'UPDATE ludo_jeux SET description=:descr, cat=:cat, année=:annee, éditeur=:editeur, age=:age, nb_joueurs=:nbj WHERE id=:idjeu;';
      $requete = $bd->prepare($sql);
      $requete->execute(array(':descr' => $postDesc,
        ':cat' => $postCat,
        ':annee' => $postAnnee,
        ':editeur' => $postEditeur,
        ':age' => $postAge,
        ':nbj' => $postNbJ,
        ':idjeu' => $jeuDemande));
      $codeMessage = "formEditJeuOK";
    }
    // Fin de traitement de la fiche

    // Obtention du jeu
    $infosJeu = infosJeuDepuisId($jeuDemande);

    if (!$infosJeu) {
      $infosJeu = null;
      $codeMessage = "jeuInvalide";
    }
  }
  else {
    $jeuDemande = null;
    $infosJeu = null;
    $listeCategories = null;
    $codeMessage = "pasDeParametre";
  }

?>
