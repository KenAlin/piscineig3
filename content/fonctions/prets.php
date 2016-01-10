<?php

function pretsEnCoursExemplaire($id) {
  // Renvoie TRUE si l'exemplaire désigné par son id est en cours de prêt

  $sql = 'SELECT * FROM ludo_emprunts WHERE idExemplaire=:id AND dateRetour IS NULL;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  return (count($result) > 0);
}

?>
