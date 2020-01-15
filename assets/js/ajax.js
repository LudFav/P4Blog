function signalement(){
    $('.signalebtn').on('click', function(e) { 
        var id = $(this).attr("id");       
        $.post({
             url: 'ControllerPost.php',
             data: {
             'signal': 'true' 
            }    
        });
    });
}