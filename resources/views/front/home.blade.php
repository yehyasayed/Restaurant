@extends('layout')
@section('head')
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <link rel="stylesheet" href="{{URL::asset('css/layout.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/home.css')}}">

        <title>Home</title>
    </head>
    <body>
@stop
@section('content')
        <section>
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"><img src="{{url('images/logo.jpg')}}" alt=""></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                                <li class="nav-item act">
                                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/menu')}}">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/order')}}">Online order</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </section>
        <section class="car">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="lay"></div>
                    <img src="{{URL::asset('images/1.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <div class="lay"></div>
                    <img src="{{URL::asset('images/2.jpeg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <div class="lay"></div>
                    <img src="{{URL::asset('images/3.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <div class="lay"></div>
                    <img src="{{URL::asset('images/4.jpg')}}" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-8 offset-2 offset-md-0 item">
                        <img src="{{URL::asset('images/about1.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="col-md-4 col-8 offset-2 offset-md-0 mt-4 item">
                        <img src="{{URL::asset('images/about2.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="col-md-4 col-8 offset-2 offset-md-0 mt-4 item">
                        <h1>About <span>SHARK</span></h1>
                        <p>Almost everyone loves Seafood. Some claim it is the most widely consumed dishes.</p>
                        <h5>Mon - Sun | 8:00AM - 9:00PM</h5>
                        <h2>+201235 4569</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="services text-center">
            <h1>Catering Services</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <i class="fas fa-birthday-cake fa-4x"></i>
                        <h3>Birthday Party</h3>
                        <p>If you want to surprise your dearest ones, our place is the perfecr place to make thier day a wonderful one, contact us for more details.</p>
                    </div>
                    <div class="col-md-4 col-12">
                        <i class="fas fa-wheelchair fa-4x"></i>
                        <h3>Business Meetings</h3>
                        <p>Business meetings can be boring in the same old office, bring your coworkers for our calm business meeting corner</p>
                    </div>
                    <div class="col-md-4 col-12">
                        <i class="fas fa-user-edit fa-4x"></i>
                        <h3>Birthday Party</h3>
                        <p>If you want to surprise your dearest ones, our place is the perfecr place to make thier day a wonderful one, contact us for more details.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="chef text-center">
            <h1>Our Master Chef</h1>
            <div class="container">
                <div class="row">
                    @foreach ($chefs as $chef)
                        <div class="col-lg-3 col-md-6 col-8 offset-md-0 offset-2">
                            <img src="{{URL::asset('images/chef/'.$chef->photo)}}" class="d-block w-100" alt="...">
                            <h3>{{$chef->name}}</h3>
                            <p>{{$chef->information}}</p>
                        </div>
                    @endforeach
                        <div class="container d-flex justify-content-center">
                            {!! $chefs ->links() !!}
                        </div>
                </div>
            </div>
        </section>

@stop
@section('foot')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            $(function(){
                $('.navbar ul li').on('click',function(e){
                    e.preventDefault();
                    $('.navbar ul li').removeClass('act');
                    $(this).addClass('act');
                    var atr = $(this).children('a').attr('href');
                    window.location.href = atr;
                });
            });
        </script>
        
        </body>
    </html>
@stop


    