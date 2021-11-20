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
        <link rel="stylesheet" href="{{URL::asset('css/order.css')}}">

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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/menu')}}">Menu</a>
                                </li>
                                <li class="nav-item act">
                                    <a class="nav-link" href="{{url('/order')}}">Online order</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </section>
        <section class="client-order">
            <h1>Make Order</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-12">
                        <form id="main_form" method="POST" action="{{url('/make-order')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-4 mt-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name">
                                    <span class="text-danger error-text name_error"></span>
                                </div>
                                <div class="col-6 mb-4 mt-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-4 mt-4">
                                    <label for="adress" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address">
                                    <span class="text-danger error-text adress_error"></span>
                                </div>
                                <div class="col-6 mb-4 mt-4">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                    <span class="text-danger error-text phone_error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-4 mt-4">
                                    <label for="order" class="form-label">Your order</label>
                                    <input type="text" class="form-control" name="order">
                                    <span class="text-danger error-text order_error"></span>
                                </div>
                                <div class="col-6 mb-4 mt-4">
                                    <label for="meals" class="form-label">Meals</label>
                                    <input type="text" class="form-control" name="meals">
                                    <span class="text-danger error-text meals_error"></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="display: block;margin:auto;">Make an order</button>
                        </form>
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
                $("#main_form").on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                        url:$(this).attr('action'),
                        method:$(this).attr('method'),
                        data:new FormData(this),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(document).find('span.error-text').text('');
                        },
                        success:function(data){
                            if(data.status == 0){
                                $.each(data.error, function(prefix, val){
                                    $('span.'+prefix+'_error').text(val[0]);
                                });
                            }else{
                                $('#main_form')[0].reset();
                                alert(data.msg);
                            }
                        }
                    });
                });
            });
        </script>
        </body>
    </html>
@stop


    