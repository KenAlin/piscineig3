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
  // Paramètres de connexion dans le fichier settings.php
  try { $bd = new PDO("mysql:host={$bdHost};dbname={$bdName};charset=utf8", "{$bdLogin}", "{$bdPass}"); }
  catch (Exception $e) { die('Erreur à la connexion à la base de données : ' . $e->getMessage()); }

  // LECTURE DE LA SESSION - Simplifie la lecture du code
  if (isset($_SESSION['estEnLigne'])) {
    $estConnecte = $_SESSION['estEnLigne']; // Soit true, soit false
  }
  else { $estConnecte = false; $_SESSION['estEnLigne'] = false; }

  if (isset($_SESSION['estAdmin'])) {
    $estAdmin = $_SESSION['estAdmin']; // Soit true, soit false
  }
  else { $estAdmin = false; $_SESSION['estAdmin'] = false; }

  // USE CASE - Passage en paramètre GET du nom du module demandé
  if (isset($_GET["uc"]) && $estConnecte) {
    // Si un use case est demandé, on le stocke dans $useCase (en le sécurisant un peu ...) ; seulement si l'utilisateur est connecté
    $useCase = htmlentities($_GET["uc"]);
    if (!verifieDroits($useCase, $estAdmin)) {
      // On n'a pas le droit d'utiliser le module demandé : on bascule sur le catalogue (qu'on est sûr de pouvoir utiliser si on est connecté !)
      $useCase = "catalogue";
    }
  }
  else {
    // Sinon, on utilise des valeurs par défaut
    if ($estConnecte) { $useCase = "catalogue"; } // Page par défaut des utilisateurs connectés : le catalogue
    else { $useCase = "login"; } // Page par défaut des utilisateurs non connectés : le formulaire de login
  }

  // ACTION - A-t-on quelque chose en paramètre POST ? (récupération d'un formulaire)
  if (isset($_POST["action"])) { $actionPost = htmlentities($_POST["action"]); }
  else { $actionPost = false; }

  // CHARGEMENT DU MODULE
  $cheminModulePre = "content/modules/{$useCase}_pre.php";
  $cheminModuleVue = "content/modules/{$useCase}.php";
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
