<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan SMP Muhammadiyah 2 Minggir | @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="text/javascript" src="{{ asset('assets') }}/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets') }}/js/bootstrap.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

    <style>
    body {
        background: linear-gradient(135deg, #005B8F, #d9d9d9); /* mengubah latar belakang menjadi gradasi abu-abu lembut */
    }

    .container {
        background: #f2f2f2;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }

    .navbar {
        background-color: #f2f2f2;
    }

    .footer {
        background-color: rgba(255, 255, 255, 0.8); /* Mengubah warna latar belakang dari abu-abu ke putih */
        padding: 20px;
        border-radius: 10px;
    }

    .sidebar-img {
        width: 80%;
        height: 80%;
    }
    .search-form {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .search-form input {
        display: none;
        width: 200px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 5px;
    }

    .search-form button {
        background: none;
        border: none;
        cursor: pointer;
    }

    .search-form .search-icon {
        font-size: 20px;
    }

    .search-form input:focus {
        display: inline-block;
    }

    .search-form button:hover + input {
        display: inline-block;
    }
</style>



<body>
    <div class="container">
        <div class="alert alert-info text-center">   
            <h4 style="margin-bottom: 0px"><b>Selamat Datang <p> Perpustakaan SMP Muhammadiyah 2 Minggir </b></h4>     
        </div>
        @include('menu')
        @include('banner')
        @include('sidebar')
        @include('konten')
        @include('footer')
    </div>
</body>

</head>
</html>
