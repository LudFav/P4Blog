var modere = $('.middle-area').attr('value');

if(modere==1){
    $('.commentName').text('La modération');
    $('.commentDate').hide();
    $('signalbtn').hide();
}