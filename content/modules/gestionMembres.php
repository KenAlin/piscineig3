<div class="row">
  <div class="col s12 m4 l2">&nbsp;</div>
  <div class="col s12 m4 l8">
    <div class="icon-block">
      <h2 class="center light-blue-text"><i class="fa fa-user"></i></h2>
      <h5 class="center">Gestion des membres</h5>
      <p class="light center">Depuis ce menu, vous pouvez gérer les membres : en ajouter, en supprimer, et modifier les existants.</p>
    </div>
  </div>
  <div class="col s12 m4 l2">&nbsp;</div>
</div>

<div class="row">
  <div class="col s12 m3 l3 center">
    <a class="btn blue waves-effect waves-light" href="creerMembre">Ajouter un membre <i class="fa fa-plus-circle"></i></a>
  </div>

  <div class="input-field col s12 m6 l6 valign-wrapper">
    <!-- AFFICHAGE BARRE RECHERCHE -->
    <form class="">
      <i class="material-icons prefix">search</i>
      <input id="recherche" type="text" class="validate"
        data-autocomplete="content/remote/autoMembres"
        data-autocomplete-no-result="Aucun membre correspondant !"
        data-autocomplete-param-name="uc"
        autocomplete="off">
      <label for="recherche">Chercher un membre par son pseudo</label>
    </form>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <table class="striped">
      <thead>
        <tr>
            <th data-field="etat"></th>
            <th data-field="pseudo">Pseudo (login)</th>
            <th data-field="nom">Nom</th>
            <th data-field="prenom">Prénom</th>
            <th data-field="actions">Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($listeMembres as $membre) { ?>
        <tr>
          <td>
            <?php if ($membre["fin_abo"] < time()) { ?>
              <span class="red-text"><i class="fa fa-exclamation tooltipped" data-position="top" data-delay="50" data-tooltip="Adhésion expirée !"></i></span>
            <?php } else if (($membre["fin_abo"] - 60*60*24*7) < time()) { ?>
              <span class="amber-text"><i class="fa fa-hourglass-end tooltipped" data-position="top" data-delay="50" data-tooltip="Adhésion expirant dans moins d'une semaine !"></i></span>
            <?php } ?>
          </td>
          <td><?php if ($membre["estAdmin"]) { ?>
            <span class="blue-grey-text"><i class="fa fa-shield tooltipped" data-position="top" data-delay="50" data-tooltip="Administrateur"></i></span>
          <?php } echo $membre["pseudo"]; ?></td>
          <td><?php echo $membre["nom"]; ?></td>
          <td><?php echo $membre["prenom"]; ?></td>
          <td>
            <a class="tooltipped" href="profil-<?php echo $membre["id"]; ?>" data-position="top" data-delay="50" data-tooltip="Aperçu du profil"><i class="fa fa-user"></i></a>
            <a class="tooltipped" href="editMdp-<?php echo $membre["id"]; ?>" data-position="top" data-delay="50" data-tooltip="Modifier le mot de passe"><i class="fa fa-key"></i></a>
            <a class="tooltipped" href="supprMembre-<?php echo $membre["id"]; ?>" data-position="top" data-delay="50" data-tooltip="Supprimer le membre"><i class="fa fa-close"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
