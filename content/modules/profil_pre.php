<?php
    // *** INFOS SUR LE MODULE ***
    $titrePage = "Votre profil";

  if ($getParamUn && $estAdmin) {
    $profilDemande = $getParamUn;
  }
  else {
    $profilDemande = $idMembre;
  }

  // Obtention nombre total de jeux (pour la pagination)
  $sql = 'SELECT * FROM ludo_utilisateurs WHERE id=:id;';
  $requete = $bd->prepare($sql);
  $requete->bindValue(':id', $profilDemande, PDO::PARAM_INT);
  $requete->execute();
  $profil = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($profil[0])) {
    $profil = $profil[0];
  }
  else {
    $profil = null;
    $codeMessage = "profilInvalide";
  }



?>
