$(document).ready(function() {

    $('.number-false').text(0);
    var numberTrue = null;
    var numberFalse = null;
    var totalTrue = null;
    var totalFalse = null;

    $('.random-images').click(function(e) {

        e.preventDefault();

        dataImg = parseInt($(this).attr('data-id'));

        dataImgTrue = parseInt($('.word-true').attr('data-id'));

        if (parseInt(dataImg) === parseInt(dataImgTrue)) {

            var audioCheck = document.createElement('audio');
            audioCheck.setAttribute('src', 'http://localhost:8000/upload/show-result.mp3');
            audioCheck.play();

            numberTrue = 1;
            totalTrue += numberTrue;
            if (localStorage.clickcount) {
                localStorage.clickcount = Number(localStorage.clickcount) + 1;
            } else {
                localStorage.clickcount = 1;
            }

            swal({
                    title: "Congratulation! ",
                    text: "Bạn hãy thử câu tiếp theo nhé! Click Do Again!",
                    icon: "success",
                    buttons: true,
                     dangerMode: false,

                });

            parent.window.location.reload();
        } else {

            var audioCheck = document.createElement('audio');
            audioCheck.setAttribute('src', 'http://localhost:8000/upload/miss.mp3');
            audioCheck.play();

            numberFalse = 1;
            totalFalse += numberFalse;

            if (localStorage.clickcount1) {
                localStorage.clickcount1 = Number(localStorage.clickcount1) + 1;
            } else {
                localStorage.clickcount1 = 1;
            }
            $('.number-false').text(localStorage.clickcount1);

            swal({
                title: "Please try again! ",
                text: " Click Do Again!",
                icon: "error",
                buttons: true,
            });
        }

    })
    var t = localStorage.getItem('clickcount');
    var t1 = localStorage.getItem('clickcount1');

    $('.number-true').text(t);
    $('.number-false').text(t1);
    $('.btn-doAgain').click(function()
    {
        localStorage.removeItem('clickcount');
        localStorage.removeItem('clickcount1');

        $('.number-true').text(0);
        $('.number-false').text(0);

    });

});
