<?php
//Test 
foreach ($billets as $billet):
?>
    <h1>
     <?= $billet->titre() ?>
    </h1>

<?php endforeach ?>