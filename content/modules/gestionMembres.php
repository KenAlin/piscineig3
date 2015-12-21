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
          <td><!-- Afficher un averto si date de renouvellement approche, ou si membre n'est plus abo. --></td>
          <td><?php echo $membre["pseudo"]; ?></td>
          <td><?php echo $membre["nom"]; ?></td>
          <td><?php echo $membre["prenom"]; ?></td>
          <td>
            <a href="editMembre-<?php echo $membre["pseudo"]; ?>"><i class="fa fa-user"></i></a>
            <a href="editMotDePasse-<?php echo $membre["pseudo"]; ?>"><i class="fa fa-key"></i></a>
            <a href="supprMembre-<?php echo $membre["pseudo"]; ?>"><i class="fa fa-close"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
