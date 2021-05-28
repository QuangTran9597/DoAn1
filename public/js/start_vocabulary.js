$(document).ready(function() {
    var audioElement = document.createElement('audio');

    $('.selected').first().addClass('show');
    $('.selected.show').first().css({
        display: "block"
    });

    $('.flashcard-outer .caption').text($('.selected-thumb').attr('title'));

    $('.selected-thumb').click(function(e)
    {
        e.preventDefault();

        $('.flashcard-outer .selected.show').attr('src', $(this).attr('src'));
        $('.flashcard-outer .caption').text($(this).attr('title'));

        $('.flashcard-outer .show').css({
            display: "block"
        });

        var audio = $(this).parent().find('.vocab-audio').attr('src');
        audioElement.setAttribute('src', audio);
        audioElement.play();
    });

    var numImgs = $('div.big-img-audio .selected').length;

    $('.next').click(function() {

        $('.selected').each(function()
        {
            var img = $(this).attr('src');

            $('.selected ').removeClass('show');

            var audio = $(this).parent().find('.audio-img').attr('src');

        });

        var cur = $('.selected').index($('.selected .show'));
        console.log(numImgs);

        if( numImgs != $('.selected').length -1)
        {
            $('.selected.show').removeClass('.show');
            $('.selected').eq(cur + 1 ).addClass('show');

            audioElement.setAttribute('src', $('.selected .show').parent().find('.audio-img').attr('src'));
            audioElement.play();
        }

    });

    $('.review-button').click(function() {
        $('#add-review-form-placeholder').show();
    })

    $('.review-close').click(function() {

        $('.review-from').hide();
    })

});

