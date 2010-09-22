
function flipFlashcard()
{
    $('#flashcard-back').toggle();
    $('#flashcard-front').toggle();
    flipRememberContainer();
}

function flipRememberContainer()
{
    $('.remember-links-container').toggle();
}

$(document).ready(function(){
    
    // transforma os botões
    $('input:submit, .button').button();
    
    // se clicar no flashcar
    $('#flashcard-front, #flashcard-back').click(function(){
        flipFlashcard();
    });
    
    // se clicar no link flip flashcard
    $('.flip-flashcard-link').click(function(){
        flipFlashcard();
        return false;
    });
    
    // Se passar o mouse sobre o flashcard
    $('#flashcard-front div div div, #flashcard-back div div div').hover(
        function(){
            $(this).addClass('hover');
        },
        function(){
            $(this).removeClass('hover');
        }
    );
});

