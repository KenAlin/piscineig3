<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Informations d'emprunt";
  include_once("content/fonctions/membres.php");
  include_once("content/fonctions/jeux.php");

  if ($getParamUn) {
    $pretDemande = $getParamUn;
  }
  else {
    $pretDemande = false;
  }

  // Obtention des infos du membre
  $pret = infosPretDepuisId($pretDemande);

  if (!$pret) {
    $pret = null;
    $emprunteur = false;
    $infosJeu = false;
    $codeMessage = "pasDeParametre";
  }
  else {
    $emprunteur = infosMembreDepuisPseudo($pret["pseudo"]);

    // Obtention du nom du jeu
    $sql = 'SELECT
      j.nom, j.id
    FROM
      ludo_exemplaires AS ex, ludo_jeux AS j
    WHERE
      ex.idEx = :id AND
      ex.idJeu = j.id ;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':id', $pret["idExemplaire"], PDO::PARAM_INT);
    $requete->execute();
    $infosJeu = $requete->fetchAll(PDO::FETCH_ASSOC);
    $infosJeu = $infosJeu[0];
  }



?>
