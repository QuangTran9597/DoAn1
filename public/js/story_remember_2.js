$(document).ready(function()
{
    var total = $('[name=total]').val();
    var checkImg = null;
    var checkAudio = null;
    var count = null;
    var score = null;

    $('.check-img').click(function()
    {
        var audioCheck = document.createElement('audio');
        audioCheck.setAttribute('src', 'http://localhost:8000/upload/check.mp3');
        audioCheck.play();

        $('.audio').each(function()
        {
            checkAudio = parseInt($(this).find('.audio-name').attr('data-id'));
            checkImg = parseInt($(this).find('.img-audio').attr('data-id'));

            if(parseInt(checkImg) === parseInt(checkAudio) ) {

               $(this).find('.icon-volume').css({ background: "lightgreen"});
                score = 1;
                count += score;

            } else {

                $(this).find('.icon-volume').css({ background: "red"});
                score = 0;
                count += score;
            }
        });

        swal({
            title: "Điểm số của bạn là: " + count + '/' + total,
            text: "Bạn có muốn làm lại bài tập không? Click Do Again!",
            icon: "success",
            buttons: true,
        }),

        $('.answer').show();

    });

    $('.doAgain').click(function() {
        parent.window.location.reload();
    });



});

