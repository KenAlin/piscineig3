<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Gestion des membres";

  // Obtention de la liste de membres
  $sql = 'SELECT * FROM ludo_utilisateurs ;';
  $requete = $bd->prepare($sql);
  $requete->execute();
  $listeMembres = $requete->fetchAll(PDO::FETCH_ASSOC); // Renvoie un array avec TOUS les membres

?>
