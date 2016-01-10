<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Réservations en cours";
  include_once("content/fonctions/jeux.php");
  include_once("content/fonctions/membres.php");

  // Obtention nombre total de reservations  $sql = 'SELECT count(*) FROM ludo_reservation WHERE dateFin >= :now AND dateEmprunt IS NULL;';  $requete = $bd->prepare($sql);  $requete->bindValue(':now', time(), PDO::PARAM_INT);  $requete->execute();  $compteReservations = $requete->fetchAll(PDO::FETCH_ASSOC);  $compteReservations = $compteReservations[0]["count(*)"];

  // Obtention de la liste des reservations  $sql = 'SELECT * FROM ludo_reservation AS res, ludo_jeux AS j WHERE dateFin >= :now AND res.idJeu = j.id AND dateEmprunt IS NULL;';  $requete = $bd->prepare($sql);  $requete->bindValue(':now', time(), PDO::PARAM_INT);  $requete->execute();  $listeReservationsEnCours = $requete->fetchAll(PDO::FETCH_ASSOC);
?>
