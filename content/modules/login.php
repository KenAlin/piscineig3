<form class="loginForm" action="login" method="post">
  <div class="elementFormLogin">
    <p>Saisissez vos identifiants de membre pour vous connecter et accéder aux service de la ludothèque.</p>
  </div>
  <input type="hidden" name="action" value="connexion">
  <div class="elementFormLogin">
    <label for="pseudo" class="labelConnexion">Pseudo</label><input type="text" name="pseudo">
  </div>
  <br>
  <div class="elementFormLogin">
    <label for="pass" class="labelConnexion">Mot de passe</label><input type="password" name="pass">
  </div>
  <br>

  <input type="submit" value="Se connecter">
</form>
