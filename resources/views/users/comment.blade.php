<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/pages/comment.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('page.showtopics')}}">Quay lại bài học</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('page.showtopics')}}">Bài Học</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Luyện Nghe</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Từ vựng</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Đề Thi</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="">Truyện</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('get.logout')}}">
                            {{ Auth::user()->name }}<i class="fas fa-sign-out-alt "></i>LogOut</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row" style="margin-top:85px">
        <div class="review-comment">
            <div class="series-review-list">
                <h3>Tất cả đánh giá cho bài học này </h3>
                @foreach ($comments as $comment )
                <div class="series-review-item" id="">

                    <img class="avatar-image" alt="{{ $comment->user_name }}" src="{{asset('img/no_avatar.png')}}">
                    <div class="series-review-content">
                        <h4 class="series-review-title">{{ $comment->title }}</h4>
                        <div class="ucan-rating rating-40"></div>
                        <p class="series-review-subtitle">
                            Viết bởi <span class="series-review-user-fullname">{{ $comment->user_name }}</span>,
                            {{ $comment->created_at }}
                        </p>
                        <div class="series-review-messages">
                            {{ $comment->content }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left">English Website For Kids</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="col-lg-4 text-lg-right">
                    <a class="mr-3" href="#!">Privacy Policy</a>
                    <a href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="{{ asset('assets/mail/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('assets/mail/contact_me.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>

