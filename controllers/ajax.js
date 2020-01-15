
        
        $('.signalbtn').on('click', function() {
            
            var id=$(this).attr('value');
                console.log(id);
                $.post({
                     url: 'ControllerAjax.php',
                     data: {'idSignal' : id },
                     success: function(data){
                        console.log('OK' + data);
                    }
                
                });
        });
            

    