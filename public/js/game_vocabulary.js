$(document).ready(function()
{
    var score = null;
    var total = $('[name="total"]').val();
    var count = null;
    $('.form-check-input').click(function() {
        var audioClick = document.createElement('audio');
        audioClick.setAttribute('src', 'http://localhost:8000/upload/click.mp3');
        audioClick.play();

        $(this).addClass('chosen');

        var check = parseInt($('.chosen').attr('data-id'));

    });

    $('.change').click(function() {
        var audioClick = document.createElement('audio');
        audioClick.setAttribute('src', 'http://localhost:8000/upload/click.mp3');
        audioClick.play();

        $(this).parent().find('.chosen').removeClass('chosen');

    });

    $('.check-img').click(function() {

        var audioCheck = document.createElement('audio');
        audioCheck.setAttribute('src', 'http://localhost:8000/upload/check.mp3');
        audioCheck.play();

        $('.images-random-four').each(function() {

            var checkID = parseInt($(this).find('.form-check-input.chosen').attr('data-id'));
            var checkword = parseInt($(this).parent().find('.wordTrue').attr('data-id'));

            if(checkword === checkID) {
                score = 1;
                count += score;
                $('.true-icon').show();
                $('.false-icon').hide();

            } else {
                score = 0;
                count += score;
                $('.true-icon').hide();
                $('.false-icon').show();

            }

        }),
        swal({
            title: "Điểm số của bạn là: " + count + '/' + total,
            text: "Bạn có muốn làm lại bài tập không? Click Do Again!",
            icon: "success",
            buttons: true,

        });

    });

    $('.doAgain').click(function() {
        parent.window.location.reload();
    });
});
