<?php

function pretsEnCoursMembre($pseudo) {
  // Renvoie les prêts en cours du membre désigné par son pseudo

  $sql = 'SELECT * FROM ludo_emprunts WHERE pseudo=:pseudo AND dateRetour IS NULL;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':pseudo', $pseudo, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

function nbPretsEnCoursMembre($pseudo) {
  // Renvoie le nombre de prêts en cours du membre désigné par son pseudo

  return count(pretsEnCoursMembre($pseudo));
}

function infosMembreDepuisPseudo($pseudo) {
  // Renvoie les infos du membre désigné par son pseudo

  $sql = 'SELECT * FROM ludo_utilisateurs WHERE pseudo=:pseudo;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':pseudo', $pseudo, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) return $result[0];
  else return false;
}

function infosMembreDepuisId($id) {
  // Renvoie les infos du membre désigné par son identifiant

  $sql = 'SELECT * FROM ludo_utilisateurs WHERE id=:id;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->bindValue(':id', $id, PDO::PARAM_INT);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  if (isset($result[0])) return $result[0];
  else return false;
}

function infosTousMembres() {
  // Renvoie toutes les infos de tous les membres

  $sql = 'SELECT * FROM ludo_utilisateurs ;';
  $requete = $GLOBALS['bd']->prepare($sql);
  $requete->execute();
  $result = $requete->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

function empruntPossible($infosUser, $infosJeu, $forcage) {
  // Renvoie true si l'emprunt est possible, un code d'erreur sinon ...

  if ($infosUser["estAdmin"] || $forcage) {
    return true;
  }
  else {
    // Les ennuis commencent ! On vérifie les deux conditions :
    //    l'adhésion est encore valable
    //    ET (pretsEnCours < pretsMax OU tentative d'emprunt d'une extension d'un jeu déjà en cours d'emprunt)
    if ($infosUser["fin_abo"] > time()) {
      $pretsEnCoursMembre = pretsEnCoursMembre($infosUser["pseudo"]);
      $nbPrets = count($pretsEnCoursMembre);

      if (count($pretsEnCoursMembre) < $GLOBALS['settings']["maxPretsPersonne"]) {
        // Fine ! C'est OK !
        return true;
      }
      else {
        if (isset($infosJeu["parent"])) {
          // On veut emprunter une extension : on vérifie avec les compteurs ...

          $tentativeEmpruntExtJeuDejaEmpruntee = false;
          $i = 0;

          while ($i <= $nbPrets || !$tentativeEmpruntExtJeuDejaEmpruntee) {
            if ($pretsEnCoursMembre["idJeu"] == $infosJeu["parent"]) { $tentativeEmpruntExtJeuDejaEmpruntee = true; }
            else { $i++; }
          }

          if ($i <= $nbPrets) {
            // Peut emprunter !!
            return true;
          }
          else {
            // Non -> peut pas emprunter !
            return "NB_PRETS_MAX_ATTEINT";
          }

        }
        else {
          // Erreur ! Trop de prêts en cours ...
          return "NB_PRETS_MAX_ATTEINT";
        }

      }

    }
    else {
      // Erreur ! L'adhésion n'est plus valable :(
      return "ADHESION_TERMINEE";
    }
  }

}


?>
