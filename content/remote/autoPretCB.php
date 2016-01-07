<?php
  include_once('../../../settings.php');
  session_start();

  // IMPORT DES FONCTIONS DE TRAITEMENT
  include_once('../fonctions/traitement.php');

  // CONNEXION A LA BD - Variable $bd est notre base de données
  include_once('../fonctions/connectBD.php');

  // LECTURE DE LA SESSION - Simplifie la lecture du code
  include_once('../fonctions/lectureSession.php');

  // Gestion des use cases
  include_once('../fonctions/gestionUCsansDroits.php');

  // Inclusions diveres essentielles ...
  include_once('../fonctions/jeux.php');

  if ($getModule) {
    // Obtention nombre total de jeux (pour la pagination)
    $ex = infosExemplaireDepuisCodeBarres($getModule);
    $sql = 'SELECT * FROM ludo_emprunts WHERE idExemplaire=:id AND dateRetour IS NULL;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':id', $ex["idEx"], PDO::PARAM_INT);
    $requete->execute();
    $listeEmprunts = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($listeEmprunts[0])) {
      $renvoi = array();
      foreach ($listeEmprunts as $emp) {
        $link = "emprunt-{$emp["idEmprunt"]}";
        $renvoi[$link] = "Par ".$emp["pseudo"];
      }
      echo jsonEncode($renvoi);
    }
    else {
      echo jsonEncode(false);
    }
  }
  else {
    echo jsonEncode(false);
  }

?>
