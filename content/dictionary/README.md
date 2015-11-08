# Dictionnaires
Les "dictionnaires" sont, ici, des collections de données en json. PHP peut les interpréter via la fonction `json_decode($chaineJson, true);` (autrement dit, il faut récupérer le contenu du fichier JSON en premier lieu puis le stocker dans une variable comme `$chaineJson`).

## droits.json
Contient la liste des modules pour la ludothèque, classé en fonction de l'autorisation requise pour y accéder. On notera que les visiteurs ne sont pas gérés : ils n'ont accès qu'au formulaire de connexion ("login").

## messages.json
Contient la liste des messages d'erreur, d'avertissement ou d'information que l'utilisateur peut rencontrer. La clé est le code d'erreur renvoyé par les diverses fonctions PHP, les valeurs contiennent les messages lisibles par les humains, et l'importance du message.
