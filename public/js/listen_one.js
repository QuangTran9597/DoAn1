$(document).ready(function() {

    var diemso = null;
    var total = null;

    var audioListen = document.createElement('audio');

    audioListen.setAttribute('src', $('.audio-name source').attr('src'));

    audioListen.addEventListener('ended', function() {
        this.play();
    }, false);

    audioListen.addEventListener("canplay", function() {

    });

    $('.icon-play').click(function() {
        audioListen.play();
    });

    $('.icon-pause').click(function() {
        audioListen.pause();
    });

    $('.icon-volume').click(function() {
        audioListen.currentTime = 0;
    });

    $('.word-true').click(function() {
        var audioClick = document.createElement('audio');
        audioClick.setAttribute('src', 'http://localhost:8000/upload/click.mp3');
        audioClick.play();

        $(this).css({
            color: "rgb(214, 78, 15)"
        });

        $(this).addClass('chosen');

        $(this).parent().find('.word-false').css({
            color: "black"
        });

        $(this).parent().find('.word-false').removeClass('chosen');

    })

    $('.word-false').click(function() {
        var audioClick = document.createElement('audio');
        audioClick.setAttribute('src', 'http://localhost:8000/upload/click.mp3');
        audioClick.play();

        $(this).css({
            color: "rgb(214, 78, 15)"
        });

        $(this).addClass('chosen');

        $(this).parent().find('.word-true').css({
            color: "black"
        });

        $(this).parent().find('.word-true').removeClass('chosen');

    })

    $('.check-word').click(function() {

        var audioCheck = document.createElement('audio');
        audioCheck.setAttribute('src', 'http://localhost:8000/upload/show-result.mp3');
        audioCheck.play();

        $('.choices-container').each(function() {
            var checkT = String($(this).find('.chosen').attr('status'));

            if (checkT === String(true)) {
                diemso = 1;
                total += diemso;
                $(this).find('.true-icon').show();
                $(this).find('.false-icon').hide();

            } else {
                diemso = 0;
                total += diemso;
                $(this).find('.true-icon').hide();
                $(this).find('.false-icon').show();
            }

        });
        swal({
                title: "Điểm số của bạn là: " + total,
                text: "Bạn có muốn làm lại bài tập không? Click Do Again!",
                icon: "success",
                buttons: true,
                // dangerMode: true,
            }),

            $('.answer').show();

    });

    $('.doAgain').click(function() {
        parent.window.location.reload();
    });

    $('.answer').click(function() {

        $('.choices-container').each(function() {
            $(this).find('.word-true').css({
                color: "rgb(11, 13, 138)"
            });

        })
    });

});
