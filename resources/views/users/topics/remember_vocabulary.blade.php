@extends('users.index')

@section('title', 'English-Topics')

@section('content')
<link rel="stylesheet" href="{{asset('css/pages/start_topics.css')}}">
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase" align="center">Topic: {{ $topics->topic_name }}</h2>
        </div>

        <div class="row lists" style="margin-top: 20px;">
            <div class="col col-sm caption-background" style="margin-top: 13px;">

                @foreach ($topics->vocabularies as $key => $vocabulary )
                <div class="list-word  vocabulary" data-id="{{ $vocabulary->id }} " draggable="true">{{ $vocabulary->vocabulary_name }} </div>

                @endforeach
            </div>

            <div class="col col-sm-10 list">
                @foreach ($topics->vocabularies as $key => $vocabulary )
               <div class="list">
                    <img class="list vocabularyImg" data-id="{{ $vocabulary->id }}"
                    title="{{ $vocabulary->vocabulary_name }}"
                    src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" />

                    <div class="caption-background"></div>
               </div>

                @endforeach
            </div>

        </div>

        <div class="row">
               <div class="col" style="display: grid">
                    <div class="btn">
                        <a  class="btn btn-primary btn-check"  style="width: 100px; margin:20px;">Check</a>
                        <a  class="btn btn-primary btn-answer" style="width: 100px; margin:20px;">Answer</a>
                        <a  class="btn btn-primary btn-doAgain" style="width: 100px; margin:20px;">Do Again</a>
                    </div>
               </div>
        </div>
    </div>
</section>
<script src="{{ asset('js/remember_vocab.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// đảo từ và hình ảnh
var words = $(".vocabulary");
for (var i = 0; i < words.length; i++)
{
    var tager = Math.floor(Math.random() * words.length - 1) + 1;
    var targer2 = Math.floor(Math.random() * words.length - 1) +1;

    words.eq(tager).before(words.eq(targer2));
}


// var vocabularyImg = $(".list");
// for ( var i = 0; i < vocabularyImg.length; i++)
// {
//     var Img1 = Math.floor(Math.random() * vocabularyImg.length + 1) + 1;
//     var Img2 = Math.floor(Math.random() * vocabularyImg.length + 1 ) +1;

//     vocabularyImg.eq(Img1).before(vocabularyImg.eq(Img2));
// }


   $(document).ready(function() {
       var img = $('.vocabularyImg');
       var caption = $('.caption-text');
       var check = null;
       var cap = null;
       $('.btn-check').click(function()
       {
            $('.vocabularyImg').each(function(index, element)
            {
               check += $('.vocabularyImg').data('id') ;
               console.log(check);
            })

            $('.caption-text').each(function()
            {
                cap += $('.caption-text').data('id');
                console.log(cap);
            })
        })



        // var caption = $('.list');
        // for ( var j = 0; j < caption.length; j++) {

        // }

    //    $(".btn-check").click(function()
    //    {
    //         // document.write('gia tri la' + $(checkImg[i]).val()+ ' <br/>' );
    //         console.log(checkImg[i++]);
    //         // console.log(checkImg[i++]); console.log(checkImg[i++]); console.log(checkImg[i++]);
    //         // console.log(checkImg[i++]);
    //         // console.log(checkImg[i++]); console.log(checkImg[i++]); console.log(checkImg[i++]);
    //         // console.log(caption[j++]);

    //    })
   })


</script>

@endsection
