@extends('user.layout')

@section('content')
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard"><i class="fa-solid fa-circle-arrow-left"></i> Home</a>

          <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i></a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" style="position: absolute;">
                      <li class="nav-item">
                        <a class="dropdown-item" href="profile"><i class="fa-solid fa-user-pen"></i> edit profile</a>
                        <a class="dropdown-item" href="settings"><i class="fa-solid fa-gear"></i> settings</a>
                        <a class="dropdown-item" href="logout"><i class="fa-solid fa-right-from-bracket"></i> logout</a>
                      </li>
                     </ul>
              </li>
            </ul>
    </div>
  </nav>
  
  <div class="container">
      <!--Transaction History Section-->
  <div class="container py-3">
    <div class="row">
        <div class="col-md-12">
          <div id="alert" role="alert" class="alert alert-success d-none">
            <i class="fa-regular fa-circle-check check text-success"></i>
            <span id="success-message"></span>
            <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
          </div>
          <div class="card bg-light shadow-lg">
            <div class="card-body">
              <h4 class="text-center">
                Tithes and Offering History
              </h4>
              <table id="myTable" class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Tithes</th>
                    <th>Offering</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <h2 class="text-center notFound"></h2>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Tithes</th>
                    <th>Offering</th>
                    <th>Date</th>
                  </tr>
              </tfoot>
              </table>
            </div>
          </div>
      </div>
  </div>
  </div>
@endsection

@section('script')

<script>
    $(document).ready(function (){
            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

            $.ajax({
                type: "GET",
                url: "/gettotheLordItem",
                type: 'json',
                success: function (response){
                    if(response.status == 400){
                        $('.notFound').html(response.message);
                    }else{
                        $.each(response.items, function (key, item){
                        $('tbody').append('<tr>\
                        <td>'+item.tithesGave+'</td>\
                        <td>'+item.offeringGave+'</td>\
                        <td>'+item.created_at+'</td>\
                        </tr>');
                    });
                    }
                }
            });
    });
</script>

@endsection