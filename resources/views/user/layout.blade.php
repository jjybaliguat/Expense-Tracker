<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/2e740f7b92.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2e740f7b92.js" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
    <!--Datatables-->
   <!--Datatables-->
    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" src="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
   
</head>
<body onload="initClock()">
  <div class="app">
    @yield('content')
  </div>
  {{View::make('user.footerDashboard')}}

</body>
<style>
    /* css for main content*/
    body{
        background: #ddd;
        overflow-x: hidden;
    }
    .app{
      position: relative;
    }
    .d-card{
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
        overflow: hidden;
        border-radius: 10px;
        transition: 0.3s;
        position: relative;
    }
    .drop-icon{
      position: absolute;
      right: 0;
      padding-right: 15px;
    }
    .d-card:hover{
      background-color: #eee;
      color: black;
      transform: scale(1.02);
    }
    #myTable_filter{
      display: none;
    }
    #myTable_info{
        display: none;
    }
    /* css for footer*/

    @media (max-width: 680px){
      footer{
        height: 2.5rem;
      }
    }
</style>

  @yield('script')
</html>