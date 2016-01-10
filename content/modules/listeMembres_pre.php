<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Liste des membres";

  // Obtention de la liste de jeux (limite les jeux par page)
  $sql = 'SELECT * FROM ludo_utilisateurs ;';
  $requete = $bd->prepare($sql);
  $requete->execute();
  $listeMembres = $requete->fetchAll(PDO::FETCH_ASSOC); // Renvoie un array avec TOUS les membres

?>
