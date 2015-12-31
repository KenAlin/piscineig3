<?php
  include_once('../../../settings.php');

  // IMPORT DES FONCTIONS DE TRAITEMENT
  include_once('../fonctions/traitement.php');

  // CONNEXION A LA BD - Variable $bd est notre base de données
  include_once('../fonctions/connectBD.php');

  // LECTURE DE LA SESSION - Simplifie la lecture du code
  include_once('../fonctions/lectureSession.php');

  // Gstion des use cases
  include_once('../fonctions/gestionUCsansDroits.php');

  if ($getModule) {
    // Obtention nombre total de jeux (pour la pagination)
    $sql = 'SELECT * FROM ludo_jeux WHERE nom LIKE :nom LIMIT 10;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':nom', "%{$getModule}%", PDO::PARAM_INT);
    $requete->execute();
    $listeJeux = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($listeJeux[0])) {
      $renvoi = array();
      foreach ($listeJeux as $jeu) {
        if ($jeu["parent"]) {
          $link = "jeu-{$jeu["parent"]}-{$jeu["id"]}";
        }
        else {
          $link = "jeu-{$jeu["id"]}";
        }
        $renvoi[$link] = $jeu["nom"];
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
