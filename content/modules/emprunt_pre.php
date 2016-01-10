<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Informations d'emprunt";
  include_once("content/fonctions/membres.php");
  include_once("content/fonctions/jeux.php");

  if ($getParamUn) {
    $pretDemande = $getParamUn;
  }
  else {
    $pretDemande = false;
  }

  // Obtention des infos du prêt
  $pret = infosPretDepuisId($pretDemande);

  if (!$pret) {
    $pret = null;
    $emprunteur = false;
    $infosJeu = false;
    $codeMessage = "pasDeParametre";
  }
  else {
    $emprunteur = infosMembreDepuisPseudo($pret["pseudo"]);

    // Est-ce qu'on vient de confirmer son retour ?
    if ($actionPost == "retour") {
      if (isset($_POST["retourOk"])) {
        $postConfirm = intval($_POST["retourOk"]);
      } else { $postConfirm = false; }

      if ($postConfirm) {
        // UPDATE !
        $sql = 'UPDATE ludo_emprunts SET dateRetour = :dateR WHERE idEmprunt = :id AND dateRetour IS NULL ;';
        $requete = $bd->prepare($sql);
        $requete->bindValue(':id', $pret["idEmprunt"], PDO::PARAM_INT);
        $requete->bindValue(':dateR', time(), PDO::PARAM_INT);
        $requete->execute();
        $codeMessage = "retourPretOK";


        $pret = infosPretDepuisId($pretDemande);
      }
      else {
        $codeMessage = "retourPretCaseNonCochee";
      }


    }

    // Obtention du nom du jeu
    $sql = 'SELECT
      j.nom, j.id
    FROM
      ludo_exemplaires AS ex, ludo_jeux AS j
    WHERE
      ex.idEx = :id AND
      ex.idJeu = j.id ;';
    $requete = $bd->prepare($sql);
    $requete->bindValue(':id', $pret["idExemplaire"], PDO::PARAM_INT);
    $requete->execute();
    $infosJeu = $requete->fetchAll(PDO::FETCH_ASSOC);
    if (isset($infosJeu[0])) {
      $infosJeu = $infosJeu[0];
    }
    else {
      // L'exemplaire a sans douté été supprimé !
      $infosJeu = array("nom" => "<i>jeu supprimé</i>", "id" => 0);
    }
  }



?>
