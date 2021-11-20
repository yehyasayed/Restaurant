<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>dashboard</title>

    <style>
        table img{
            width: 200px;
            height: 150px;
        }
        .containerr{
            width: 40%;
            margin: auto;
        }
        .nav{
            background-color: rgb(192, 192, 192);
        }
        .nav li{
            padding: 10px;
        }
        .nav a{
            color: black;
        }
    </style>
  </head>
  <body>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/home')}}">Home</a>
        </li>
    </ul>
    <div class="containerr"> 
        <h1 class="text-center mt-5 mb-5">Add Chef</h1>
        <form id="chef_form" method="POST" action="{{url('/admin/add-chef')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
                <span class="text-danger error-text name_error1"></span>
            </div>
            <div class="mb-3">
                <label for="information" class="form-label">Information</label>
                <input type="text" class="form-control" name="information">
                <span class="text-danger error-text information_error1"></span>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Image</label>
                <input type="file" class="form-control" name="photo">
                <span class="text-danger error-text photo_error1"></span>
            </div>
            <button type="submit" class="btn btn-primary" style="display: block;margin:auto;">Submit</button>
        </form>
    </div>
    <div class="containerr mb-5"> 
        <h1 class="text-center mt-5 mb-5">Add menu</h1>
        <form id="menu_form" method="POST" action="{{url('/admin/add-menu')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
                <span class="text-danger error-text title_error2"></span>
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <input type="text" class="form-control" name="details">
                <span class="text-danger error-text details_error2"></span>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" name="type">
                <span class="text-danger error-text type_error2"></span>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price">
                <span class="text-danger error-text price_error2"></span>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Image</label>
                <input type="file" class="form-control" name="photo">
                <span class="text-danger error-text photo_error2"></span>
            </div>
            <button type="submit" class="btn btn-primary" style="display: block;margin:auto;">Submit</button>
        </form>
    </div>
    <div class="container">
        <h1 class="text-center mt-5 mb-5">Chef</h1>
        <table class="table mt-5 mb-5 text-center" border="1">
            <thead>
                <tr>
                <th scope="col">Delet</th>
                <th scope="col">name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items[0] as $item)
                <tr class="chefRow{{$item -> id}}">
                <td>
                    <button type="button" chef_id="{{$item -> id}}" class="btn btn-danger chef-button">Delet</button>
                </td>
                <td>{{$item -> name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        <h1 class="text-center mt-5 mb-5">Menu</h1>
        <table class="table mt-5 mb-5 text-center" border="1">
            <thead>
                <tr>
                <th scope="col">Delet</th>
                <th scope="col">title</th>
                <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items[1] as $item)
                <tr class="menuRow{{$item -> id}}">
                <td>
                    <button type="button" menu_id="{{$item -> id}}" class="btn btn-danger menu-button">Delet</button>
                </td>
                <td>{{$item -> title}}</td>
                <td>{{$item -> type}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function(){

            $("#chef_form").on('submit', function(e){
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
                                $('span.'+prefix+'_error1').text(val[0]);
                            });
                        }else{
                            $('#chef_form')[0].reset();
                            alert(data.msg);
                        }
                    }
                });
            });
            $("#menu_form").on('submit', function(e){
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
                                $('span.'+prefix+'_error2').text(val[0]);
                            });
                        }else{
                            $('#menu_form')[0].reset();
                            alert(data.msg);
                        }
                    }
                });
            });
        });
    </script>
    <script>
        $(function(){
            $(".chef-button").on('click', function(e){
                e.preventDefault();
                var chef_id = $(this).attr('chef_id');
                $.ajax({
                    type:'POST',
                    url:"{{ url('/admin/delet-chef') }}",
                    data:{
                        '_token' : "{{ csrf_token() }}",
                        'id' : chef_id
                    },
                    success:function(data) {
                        $('.chefRow'+data.id).remove();
                    }
                });
            });
        });
        $(function(){
            $(".menu-button").on('click', function(e){
                e.preventDefault();
                var menu_id = $(this).attr('menu_id');
                $.ajax({
                    type:'POST',
                    url:"{{ url('/admin/delet-menu') }}",
                    data:{
                        '_token' : "{{ csrf_token() }}",
                        'id' : menu_id
                    },
                    success:function(data) {
                        $('.menuRow'+data.id).remove();
                    }
                });
            });
        });
    </script>
  </body>
</html>