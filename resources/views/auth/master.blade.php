<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <script src="https://kit.fontawesome.com/2e740f7b92.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/app.css">
</head>
<body>
    {{View::make('auth.header')}}
    @yield('content')
    {{View::make('auth.footer')}}





</body>
<style>

/* css for login content*/
.input-group{
    margin-top: 10px;
}

    /* css for header*/
.menu-icon i{
    display: none;
    color: white;
    font-size: 30px;
    padding: 10px 5px;
    cursor: pointer;
}
.nav-link{
    border-radius: 5px;
    padding: 3px 5px;
    text-transform: uppercase;
    transition: 0.3s;
}
.nav-item a:hover{
    color: white;
}
.nav-item a.active{
    color: white;
}
/* css for footer*/
footer{
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 99;
        }
</style>
</html>