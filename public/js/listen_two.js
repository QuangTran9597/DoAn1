$(document).ready(function() {

    var audioListen = document.createElement('audio');

    audioListen.setAttribute('src', $('.audio-name-listen source').attr('src'));

    audioListen.addEventListener('ended', function() {
        this.play();
    }, false);

    audioListen.addEventListener("canplay", function() {

    });

    $('.icon-play').click(function()
    {
        audioListen.play();
    });

    $('.icon-pause').click(function()
    {
        audioListen.pause();
    });

    $('.icon-volume').click(function()
    {
        audioListen.currentTime = 0;
    });

    $('.check-word').click(function() {

        var audioCheck = document.createElement('audio');
        audioCheck.setAttribute('src', 'http://localhost:8000/upload/show-result.mp3');
        audioCheck.play();

        var diem = null;
        var total = null;

        $('.listen-check').each(function() {
            var inputName = String($(this).find('.name-check').val());
            var name = String($(this).find('.name-check').attr('data'));

            var inputTelephone = parseInt($(this).find('.phone-check').val());
            var phone = parseInt($(this).find('.phone-check').attr('data'));

            var inputMessage = String($(this).find('.message-check').val());
            var message = String($(this).find('.message-check').attr('data'));

            if (inputName === name) {

                $(this).find('.name-check').css({
                    background: "limegreen"
                });

                diem = 1;
                total += diem;
            } else {

                $(this).find('.name-check').css({
                    background: "tomato"
                });

                diem = 0;
                total += diem;
            };

            if (inputTelephone === phone) {

                $(this).find('.phone-check').css({
                    background: "limegreen"
                });

                diem = 1;
                total += diem;

            } else {

                $(this).find('.phone-check').css({
                    background: "tomato"
                });

                diem = 0;
                total += diem;

            };

            if (inputMessage === message) {

                $(this).find('.message-check').css({
                    background: "limegreen"
                });

                diem = 1;
                total += diem;

            } else {

                $(this).find('.message-check').css({
                    background: "tomato"
                });

                diem = 0;
                total += diem;

            };

        });

        $('.answer').show();

    });


    $('.doAgain').click(function()
    {
        parent.window.location.reload();
    });


    $('.answer').click(function() {

        $('.listen-check').each(function() {
            
            var audioCheck = document.createElement('audio');
            audioCheck.setAttribute('src', 'http://localhost:8000/upload/show-result.mp3');
            audioCheck.play();

            $(this).find('.name-check').val($(this).find('.name-check').attr('data'));

            $(this).find('.phone-check').val($(this).find('.phone-check').attr('data'));

            $(this).find('.message-check').val($(this).find('.message-check').attr('data'));

        })
    });

});
