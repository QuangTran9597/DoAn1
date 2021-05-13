var audioElement = document.createElement('audio');
$(document).ready(function() {
    $(".item").first().addClass('active')
    $('.prev').click(function() {
        var cur = $('.item').index($('.item.active'));
        if (cur != 0) {
            $('.item').removeClass('active');
            $('.item').eq(cur - 1).addClass('active');
            audioElement.setAttribute('src', $('.item.active audio source').attr('src'));
            audioElement.play();
        }
    });
    $('.next').click(function() {
        var cur = $('.item').index($('.item.active'));
        if (cur != $('.item').length - 1) {
            $('.item').removeClass('active');
            $('.item').eq(cur + 1).addClass('active');
            audioElement.setAttribute('src', $('.item.active audio source').attr('src'));
            audioElement.play();
        }
    });
    var $val = $('.item.active audio source').attr('src');
    // $('#myaudio').autoplay();
    audioElement.setAttribute('src', $val);
    $('.replay').click(function() {
        audioElement.setAttribute('src', $('.item.active audio source').attr('src'));
        // audioElement.load();
        audioElement.play();
    });
    // $('#restart').click(function() {
    //     audioElement.currentTime = 0;
    // });
})

  