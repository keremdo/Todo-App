<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('btcss/bootstrap.min.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container nav-bar bg-light">
        <div class="row">
            <a  style="text-decoration: none; color:black;" class="col-6 nav-left">
                DoToDo
            </a>
            <div class="col-6 nav-right ">
                <a href="{{route('todolist')}}" >
                    Aktif Görevler
                </a>
                <a href="{{route('pasivetodolist')}}" >
                    Pasif Görevler
                </a>
            </div>
        </div>
        
    </div>

    {{$slot}}

    <script src="{{asset('btjs/bootstrap.bundle.js')}}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>