<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>EduLine</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->

    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="//vjs.zencdn.net/5.19/video-js.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark top-navbar">

        <div class="container">
            <a class="navbar-brand" href="/">EduLine</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown d-none d-sm-none d-md-block">
                        {{Form::open(['route'=>'courses.search', 'method'=>'get'])}}
                            <input class="form-control mr-sm-2 main-search" type="search" name="search">
                        {{Form::close()}}
                    </li>
                    <li class="nav-item dropdown d-block">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Курси
                        </a>
                        <div class="dropdown-menu pl-3 main-link" aria-labelledby="navbarDropdown">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="font-weight-light"><i class="fa fa-calendar-plus-o fa-black" aria-hidden="true"></i>Курси</h5>
                                    <a class="dropdown-item" href="/">Всі курси</a>
                                    <a class="dropdown-item" href="{{route('courses.own')}}">Мої курси</a>
                                </div>
                                <div class="col-sm-12">
                                    <h5 class="font-weight-light"><i class="fa fa-file-word-o fa-black" aria-hidden="true"></i>Слова</h5>
                                    <a class="dropdown-item" href="{{route('courses.own')}}">Набори слів</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Категорії
                        </a>
                        <div class="dropdown-menu pl-3 main-link" aria-labelledby="navbarDropdown">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="font-weight-light"><i class="fa fa-code fa-black" aria-hidden="true"></i> Розробка</h5>
                                    @foreach($dev_categories as $dev_cat)
                                    <a class="dropdown-item" href="{{route('course.category',$dev_cat->id)}}">{{$dev_cat->title}}</a>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    <h5 class="font-weight-light"><i class="fa fa-language fa-black" aria-hidden="true"></i> Вивчення мов</h5>
                                    @foreach($lang_categories as $lang_cat)
                                        <a class="dropdown-item" href="{{route('course.category',$lang_cat->id)}}">{{$lang_cat->title}}</a>
                                    @endforeach
                                </div>
                                <div class="col-md-4">
                                    <h5 class="font-weight-light"><i class="fa fa-briefcase fa-black" aria-hidden="true"></i> Інше</h5>
                                    @foreach($business_categories as $business_cat)
                                        <a class="dropdown-item" href="{{route('course.category',$business_cat->id)}}">{{$business_cat->title}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
                
                    <div class="dropdown">

                                @if(Auth::check())
                                <a class="nav-link dropdown-toggle navbarDropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Auth::user()->name}}
                                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @if(Auth::user()->status == 1)

                                        <h6 class="dropdown-header">Баланс: {{Auth::user()->money}} грн. </h6>

                                    <a class="dropdown-item" href="{{route('teacher.index')}}">Мої курси</a>

                                  <a class="dropdown-item" href="{{route('profile.index')}}">Профіль</a>
                                @endif
                                  <a class="dropdown-item" href="/logout">Вийти</a>
                                </div>
                                   
                                @else
                                    <a href="/login"> <button class="btn btn-outline-light" type="button">Вхід</button></a>
                                    <a href="/register"> <button class="btn btn-outline-light ml-2" type="button">Реєстрація</button></a>

                                @endif

                        </div>
              
                


            </div>
        </div>
    </nav>
</header>

@yield('content')


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//vjs.zencdn.net/5.19/video.min.js"></script>
</body>
</html>
