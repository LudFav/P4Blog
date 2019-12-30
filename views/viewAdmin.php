<div class="slider">
  <div class="display-table  center-text">
    <h1 class="title display-table-cell"><b>ADMIN</b></h1>
  </div>
</div><!-- slider -->

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
            <table>
  <thead>
    <tr>
      <th>#</th>
      <th>Auteur</th>
      <th>Titre</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($billets as $billet):
     ?>
    <tr>
      <td><?php echo ($billet->id()); ?></td>
      <td><?php echo ($billet->auteur()); ?></td>
      <td><?php echo ($billet->titre()); ?></td>
      <td><?php echo ($billet->date()); ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
                    
            </div>        
        </div>
    </div>
</body>
</html>