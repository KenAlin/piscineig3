<?php
  // Paramètres de connexion dans le fichier settings.php
  try { $bd = new PDO("mysql:host={$bdHost};dbname={$bdName};charset=utf8", "{$bdLogin}", "{$bdPass}"); }
  catch (Exception $e) { die('Erreur à la connexion à la base de données : ' . $e->getMessage()); }
?>
