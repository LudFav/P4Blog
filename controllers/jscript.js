var comModere = $('.middle-area').attr('value');

if(comModere==1){
    $('.commentName').text('La modération');
    $('.commentDate').hide();
    $('signalbtn').hide();
}