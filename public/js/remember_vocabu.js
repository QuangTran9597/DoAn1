$(document).ready(function() {
    var total = $('[name="total"]').val();
    var img = $('.vocabularyImg');
    var caption = $('.caption-text');
    var checkImg = null;
    var checkCaption = null;
    var scores = null;
    var count = null;
    $('.btn-check').click(function() {
        var audioCheck = document.createElement('audio');
        audioCheck.setAttribute('src', 'http://localhost:8000/upload/check.mp3');
        audioCheck.play();

        $('.vocabularyImg').each(function() {

            checkImg = parseInt($(this).attr('data-id'));
            checkCaption = parseInt($(this).parent().find('.list-word').attr('data-id'));

            if (parseInt(checkImg) === parseInt(checkCaption)) {

                 $(this).parent().find('.icon-true').show();
                 $(this).parent().find('.icon-false').hide();

                scores = 1;
                count += scores;
                console.log('true');
            } else {

                $(this).parent().find('.icon-true').hide();
                 $(this).parent().find('.icon-false').show();

                scores = 0;
                count += scores;
                console.log('false');
            }

        });
        swal({
            title: "Điểm số của bạn là: " + count + '/' + total,
            text: "Bạn có muốn làm lại bài tập không? Click Do Again!",
            icon: "success",
            buttons: true,

        });
    });

    $('.btn-doAgain').click(function() {
        location.reload();
    });

    $('.review-button').click(function() {
        $('#add-review-form-placeholder').show()
    })
    $('.btn-next-topics').click(function(){
        localStorage.removeItem("clickcount");

    });
});
