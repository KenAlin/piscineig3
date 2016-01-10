<?php

  // *** INFOS SUR LE MODULE ***
  $titrePage = "Prêts en cours";
  include_once("content/fonctions/membres.php");
  include_once("content/fonctions/jeux.php");

  // Obtention nombre total d'emprunts
  $sql = 'SELECT count(*) FROM ludo_emprunts WHERE dateRetour IS NULL ;';
  $requete = $bd->prepare($sql);
  $requete->execute();
  $compteEmprunts = $requete->fetchAll(PDO::FETCH_ASSOC);
  $compteEmprunts = $compteEmprunts[0]["count(*)"];

  // Obtention de la liste de jeux
  $sql = 'SELECT
    *
  FROM
    ludo_emprunts AS emp, ludo_exemplaires AS ex, ludo_jeux AS j
  WHERE
    emp.idExemplaire = ex.idEx AND
    ex.idJeu = j.id AND
    emp.dateRetour IS NULL ;';
  $requete = $bd->prepare($sql);
  $requete->execute();
  $listeEmpruntsEnCours = $requete->fetchAll(PDO::FETCH_ASSOC);

?>
