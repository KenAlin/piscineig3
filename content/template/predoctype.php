<?php
  // DEBUG : Affiche toutes les erreurs (pour le développement ... affiche jusqu'aux varibles non initialisées)
  error_reporting(E_ALL);
  $debug = "";

  // Initialisation de la session
  session_start();

  // PARAMETRES DE BASE - Important : région France
  setlocale (LC_TIME, 'fr_FR.utf8','fra');
  date_default_timezone_set('Europe/Paris');

  // IMPORT DES FONCTIONS CORE - Important pour la suite !
  include_once('content/fonctions/core.php');

  // CONNEXION A LA BD - Variable $bd est notre base de données
  include_once('content/fonctions/connectBD.php');

  // LECTURE DE LA SESSION - Simplifie la lecture du code
  include_once('content/fonctions/lectureSession.php');

  // Gstion des use cases
  include_once('content/fonctions/gestionUC.php');

  // ACTION - A-t-on quelque chose en paramètre POST ? (récupération d'un formulaire)
  if (isset($_POST["action"])) { $actionPost = htmlentities($_POST["action"]); }
  else { $actionPost = false; }

  // CHARGEMENT DU MODULE
  $cheminModulePre = "content/modules/{$getModule}_pre.php";
  $cheminModuleVue = "content/modules/{$getModule}.php";
  if (file_exists($cheminModulePre)) {
    // On va laisser le module travailler ...
    include_once($cheminModulePre);
  }

  // FONCTIONS AFFICHAGE - Gestion des messages, du menu, etc ...
  include_once("content/fonctions/display.php");
  if (isset($codeMessage)) {
    $renvoiMessage = gestionMessage($codeMessage);
    $messageUtilisateur = $renvoiMessage[0];
    $messageImportance = $renvoiMessage[1];

  }
  else {
    $messageUtilisateur = false;
    $messageImportance = false;
  }


?>
