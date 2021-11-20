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
        <link rel="stylesheet" href="{{URL::asset('css/menu.css')}}">

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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/home')}}">Home</a>
                                </li>
                                <li class="nav-item act">
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
                        <img src="{{URL::asset('images/5.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <div class="lay"></div>
                        <img src="{{URL::asset('images/6.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <div class="lay"></div>
                        <img src="{{URL::asset('images/7.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <div class="lay"></div>
                        <img src="{{URL::asset('images/8.jpg')}}" class="d-block w-100" alt="...">
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
        <section class="order text-center mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul>
                            <li><a href="{{url('/menu/meals')}}" style="background-color: #c8a97e;color: white;">Meals</a></li>
                            <li><a href="{{url('/menu/desserts')}}">Desserts</a></li>
                            <li><a href="{{url('/menu/drinks')}}">Drinks</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="eater">
            <div class="container">
                <div class="row">
                    @php
                        $i=1;
                        $j=1;
                    @endphp
                    @foreach ($items as $item)
                        @if ( $i%3==0 )
                            @php
                                $j+=1;
                                $i=1;
                            @endphp
                        @endif
                        @if ( $j%2!=0 )
                            <div class="col-lg-3 col-6 item-image">
                                <img src="{{URL::asset('images/menu/'.$item->photo)}}" alt="">
                            </div>
                            <div class="col-lg-3 col-6 p-4">
                                <h4>{{$item->title}}</h4>
                                <p>{{$item->details}}</p>
                                <span>{{$item->price}} L.E</span>
                                <button type="button" class="btn btn-primary"><a href="{{url('/order')}}">Order now</a></button>
                            </div>
                        @endif
                        @if ( $j%2==0 )
                            <div class="col-lg-3 col-6 p-4">
                                <h4>{{$item->title}}</h4>
                                <p>{{$item->details}}</p>
                                <span>{{$item->price}} L.E</span>
                                <button type="button" class="btn btn-primary"><a href="{{url('/order')}}">Order now</a></button>
                            </div>
                            <div class="col-lg-3 col-6 item-image">
                                <img src="{{URL::asset('images/menu/'.$item->photo)}}" alt="">
                            </div>
                        @endif
                        @php
                            $i+=1;
                        @endphp
                    @endforeach
                </div>
            </div>
        </section>
        <div class="container d-flex justify-content-center mb-5">
            {!! $items ->links() !!}
        </div>
@stop
@section('foot')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        </body>
    </html>
@stop


    