<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Profil";
  include_once("content/fonctions/membres.php");

  if ($getParamUn && $estAdmin) {
    $profilDemande = $getParamUn;
  }
  else {
    $profilDemande = $idMembre;
  }

  // Obtention des infos du membre
  $profil = infosMembreDepuisId($profilDemande);

  if (!$profil) {
    $profil = null;
    $codeMessage = "profilInvalide";
    $listePrets = null;
    $nbPretsRetard = 0;
    $listeResa = null;

  }
  else {
    $nbPretsRetard = count(pretsEnRetardMembre($profil["pseudo"]));

    // Obtention de la liste de jeux en prêt
    $sql = 'SELECT
      *
    FROM
      ludo_emprunts AS emp, ludo_exemplaires AS ex, ludo_jeux AS j
    WHERE
      emp.idExemplaire = ex.idEx AND
      ex.idJeu = j.id AND
      emp.dateRetour IS NULL AND
      emp.pseudo = :pseudo;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':pseudo', $profil["pseudo"], PDO::PARAM_INT);
    $requete->execute();
    $listePrets = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Obtention de la liste de jeux en réservation
    $sql = 'SELECT
      *
    FROM
      ludo_reservation AS res, ludo_jeux AS j
    WHERE
      res.idJeu = j.id AND
      res.dateEmprunt IS NULL AND
      res.dateFin > :now AND
      res.pseudo = :pseudo;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':pseudo', $profil["pseudo"], PDO::PARAM_INT);
    $requete->bindValue(':now', time(), PDO::PARAM_INT);
    $requete->execute();
    $listeResa = $requete->fetchAll(PDO::FETCH_ASSOC);

  }



?>
