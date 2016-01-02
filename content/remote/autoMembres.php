<?php
  include_once('../../../settings.php');
  session_start();

  // IMPORT DES FONCTIONS DE TRAITEMENT
  include_once('../fonctions/traitement.php');

  // CONNEXION A LA BD - Variable $bd est notre base de données
  include_once('../fonctions/connectBD.php');

  // LECTURE DE LA SESSION - Simplifie la lecture du code
  include_once('../fonctions/lectureSession.php');

  // Gstion des use cases
  include_once('../fonctions/gestionUCsansDroits.php');

  if ($getModule && $estAdmin) {
    // Obtention membres
    $sql = 'SELECT * FROM ludo_utilisateurs WHERE pseudo LIKE :pseudo LIMIT 10;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':pseudo', "%{$getModule}%", PDO::PARAM_INT);
    $requete->execute();
    $listeUsers = $requete->fetchAll(PDO::FETCH_ASSOC);

    if (isset($listeUsers[0])) {
      $renvoi = array();
      foreach ($listeUsers as $user) {
        $link = "profil-{$user["id"]}";
        $renvoi[$link] = $user["pseudo"];
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
