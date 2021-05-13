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
            <div class="col col-sm caption-background">
                <!-- <div class="list-word" draggable="true">Test 1</div>
                <div class="list-word" draggable="true">Test 2</div>
                <div class="list-word" draggable="true">Test 3</div> -->
                @foreach ($topics->vocabularies as $key => $vocabulary )
                <div class="list-word  vocabulary" draggable="true">{{ $vocabulary->vocabulary_name }} </div>

                @endforeach
            </div>

            <div class="col col-sm-10 caption-background">
                @foreach ($topics->vocabularies as $key => $vocabulary )
               <div class="list">
                    <img class="list vocabularyImg" key="{{ $key }}"
                    title="{{ $vocabulary->vocabulary_name }} = {{ $vocabulary->vietsub }}"
                    id="images" src="/upload/images/vocabulary/{{ $vocabulary->vocabulary_image}}" />

                    <div class="caption-background"></div>
               </div>

                @endforeach
            </div>

        </div>
    </div>
</section>
<script src="{{ asset('js/remember_vocab.js')}}"></script>

@endsection
