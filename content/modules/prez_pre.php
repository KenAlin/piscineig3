<?php
  // *** INFOS SUR LE MODULE ***
  $titrePage = "Prézentation !";

  if ($actionPost == "ask") {
    if (isset($_POST["question"]) && strlen($_POST["question"]) > 2) {
      $postQuestion = trim(htmlentities($_POST["question"]));
    } else { $postQuestion = "default"; }
    $nomPagePrez = $postQuestion;

    if (!file_exists("content/prez/pages/{$nomPagePrez}.php")) $nomPagePrez = "default";
  }
  else {
    $nomPagePrez = "default";
  }

?>
