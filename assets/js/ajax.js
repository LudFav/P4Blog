function signalement(){
    $('#signal<?= echo $commentaire->id()?>').on('click', function(e) {       
        $.post({
             url: 'ControllerPost.php',
             data: {
             'signal': 'true' 
            }    
        });
    });
}