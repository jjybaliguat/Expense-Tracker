@extends('user.layout')

@section('content')
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <div class="container-fluid">
      <h1 class=" navbar-brand text-white">Welcome {{$data->username}}</h1>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i></a>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" style="position: absolute;">
                  <li>
                    <a class="dropdown-item" href="profile"><i class="fa-solid fa-user-pen"></i> edit profile</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="settings"><i class="fa-solid fa-gear"></i> settings</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="logout"><i class="fa-solid fa-right-from-bracket"></i> logout</a>
                  </li>
                 </ul>
          </li>
        </ul>
    </div>
  </nav>
        
  <h1 class="text-center text-primary mt-4">Welcome to Expense Tracker!</h1>
      <!--Clock Section-->
      <h4 class="text-center">
        <span id="dayname">Day</span>,
        <span id="month">Month</span>
        <span id="daynum">00</span>,
        <span id="year">Year</span>
      </h4>
        <h3 class="text-center">
          <span id="hour">00</span>:
          <span id="minutes">00</span>:
          <span id="seconds">00</span>
          <span id="period" class="bg-white px-2 rounded shadow">AM</span>
        </h3>
    <!--End clock section-->

<!--Cards Section-->
  <div class="container mt-3">
    <div class="row justify-content-center">
      <!--Income Section-->
        <div class="col-md-3">
            <div class="card text-center mb-2 bg-success d-card">
                <div class="card-body">
                    <div class="text-white text-center">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="fa-solid fa-sack-dollar fa-2x"></i>
                            </div>
                            <div class="col">
                                <h3 class="display-7">₱ <span id="totalIncome">0</span></h3>
                                <h6>Total Income</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Income Section-->

        <!--Expense Section-->
        <div class="col-md-3">
            <div class="card text-center mb-2 bg-danger d-card">
                <div class="card-body">
                    <div class="text-white text-center">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="fa-solid fa-sack-dollar fa-2x"></i>
                            </div>
                            <div class="col">
                                <h3 class="display-7">₱ <span id="totalExpense">0</span></h3>
                                <h6>Total Expense</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Expense Section-->
        
         <!--Tithes Section-->
        <div class="col-md-3">
          <div class="card text-center mb-2 bg-secondary d-card">
            <div class="drop-icon dropdown">
              <a class="text-white" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis"></i></a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="viewcompletedtotheLord">view</a>
                </li>
                <li>
                  <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#saveTotheLordModal" >mark as done</button>
                </li>
               </ul>
            </div>
              <div class="card-body">
                  <div class="text-white text-center">
                      <div class="row align-items-center">
                          <div class="col">
                              <i class="fa-solid fa-sack-dollar fa-2x"></i>
                          </div>
                          <div class="col">
                              <h3 class="display-7">₱ <span id="tithes">0</span></h3>
                              <h6>Tithes</h6>
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>

                {{--saveTotheLord Modal--}}
          <div class="modal fade" id="saveTotheLordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Mark as Completed</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="form-group mb-3">
                    <h2>Are you sure you already gave Tithes and Offering to the Church?</h2>
                    <input type="hidden" id="tithes-offering" value="Tithes and Offering">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary saveTithes">Yes</button>
                </div>
              </div>
            </div>
          </div>
          {{--End saveTotheLord Modal--}}

      <!--End Tithes Section-->
      
       <!--Offering Section-->
        <div class="col-md-3">
          <div class="card text-center mb-2 bg-secondary d-card">
              <div class="card-body">
                  <div class="text-white text-center">
                      <div class="row align-items-center">
                          <div class="col">
                              <i class="fa-solid fa-sack-dollar fa-2x"></i>
                          </div>
                          <div class="col">
                              <h3 class="display-7">₱ <span id="offering">0</span></h3>
                              <h6>Offering</h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--End Offering Section-->

        <!--Net Income Section-->
        <div class="col-md-3">
            <div class="card text-center mb-2 bg-primary d-card">
                <div class="card-body">
                    <div class="text-white text-center">
                        <div class="row align-items-center">
                            <div class="col">
                                <i class="fa-solid fa-sack-dollar fa-2x"></i>
                            </div>
                            <div class="col">
                                <h3 class="display-7">₱ <span id="netIncome">0</span></h3>
                                <h6>Net Income</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Net Income Section-->
    </div>
  </div>
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
            <div class="card-header">
                <h3>Expense Tracker
                    <a href="" class="btn btn-success float-end btn-sm m-1" 
                    data-bs-toggle="modal" data-bs-target="#addExpenseModal">Add expense</a>
                    <a href="#" class="btn btn-primary float-end btn-sm m-1"
                    data-bs-toggle="modal" data-bs-target="#addIncomeModal">Add income</a>
                </h3>
            </div>
            <div class="card-body">
              <h4 class="text-center">
                Transaction History
              </h4>
              <table id="myTable" class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th style="display:none;">ID</th>
                    <th>Transaction type</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Tithes</th>
                    <th>Offering</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <h2 class="text-center notFound"></h2>
                </tbody>
                <tfoot>
                  <tr>
                    <th style="display:none;">ID</th>
                    <th>Transaction type</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Tithes</th>
                    <th>Offering</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
              </tfoot>
              </table>
            </div>
          </div>
      </div>
  </div>
  {{--Add Income Modal--}}
<div class="modal fade" id="addIncomeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Income</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <ul id="income-errors"></ul>
            <input type="hidden" class="form-control transaction_type" value="Income">
            <label for="">Income Description</label>
            <textarea type="text" class="form-control income_description"></textarea>
            <label for="">Enter amount</label>
            <input type="number" class="form-control income_amount">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary add_income">Add</button>
        </div>
      </div>
    </div>
  </div>
{{--End add Income Modal--}}

  {{--Add Expense Modal--}}
<div class="modal fade" id="addExpenseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <ul id="expense-errors"></ul>
            <input type="hidden" class="form-control transaction_type2" value="Expense">
            <label for="">Expense Description</label>
            <textarea type="text" class="form-control expense_description"></textarea>
            <label for="">Enter amount</label>
            <input type="number" class="form-control expense_amount">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary add_expense">Add</button>
        </div>
      </div>
    </div>
  </div>
{{--End add Expense Modal--}}

  {{--Edit Modal--}}
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Transaction</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <ul id="edit-errors"></ul>
            <input type="hidden" name="transaction_id" id="transaction_id">
            <input type="hidden" name="transactionType" id="transaction_type">
            <label for="">Expense Description</label>
            <textarea type="text" class="form-control expense_description" id="description"></textarea>
            <label for="">Enter amount</label>
            <input type="text" class="form-control expense_amount" id="amount">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary edit_transaction">Update</button>
        </div>
      </div>
    </div>
  </div>
{{--End Edit Modal--}}
  {{--Delete Modal--}}
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Transaction</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <h2>Do you want to delete this transaction?</h2>
            <input type="hidden" name="transaction_id" id="transaction_id2">
            <input type="hidden" name="transaction_type" id="transaction_type2">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary delete_transaction">Yes Delete</button>
        </div>
      </div>
    </div>
  </div>
{{--End delete Modal--}}
@endsection

@section('script')
  <script>
    $(document).ready(function (){

      getTransaction();
      
      let a, b , c = "";
      function addTransaction(a , b, c, modal, err_name, addname){
          var data = {
          'TransactionType' : $(a).val(),
          'Description' : $(b).val(),
          'Amount' : $(c).val()
        };
        //console.log(data)

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: "POST",
          url: "transactions",
          data : data,
          dataType: "json",
          success: function (response){
            //console.log(response.errors.name);
            if(response.status == 400){
              $(err_name).html("");
              $.each(response.errors, function (key, err_values){
                $(err_name).append('<li class="text-danger">'+err_values+'</li>');
              });
            }else{
              $(addname).html("Add");
              $('#success-message').html("");
              $('#alert').removeClass('d-none');
              $('#success-message').text(response.message);
              $(modal).find('input[type="text"]').val("");
              $(modal).find('textarea').val("");
              $(modal).find('input[type="number"]').val("");
              $(modal).modal('hide');
              getTransaction();
              alertTimeout();
            }
            //console.log(response)
          }
        })
        }

        function updateTransaction(){
          var data = {
          'Transaction_id' : $('#transaction_id').val(),
          'TransactionType' : $('#transaction_type').val(),
          'Description' : $('#description').val(),
          'Amount' : $('#amount').val()
          };
          //console.log(data);
          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: "POST",
          url: "update-transaction",
          data : data,
          dataType: "json",
          success: function (response){
            if(response.status == 400){
              $.each(response.errors, function (key, err_values){
                $('#edit-errors').append('<li class="text-danger">'+err_values+'</li>');
              });
            }else{
              //console.log(response)
              $('.edit_transaction').html("Update");
              $('#success-message').html("");
              $('#alert').removeClass('d-none');
              $('#success-message').text(response.message);
              $('#editmodal').find('input[type="text"]').val("");
              $('#editmodal').find('textarea').val("");
              $('#editmodal').find('input[type="number"]').val("");
              $('#editmodal').modal('hide');
              getTransaction();
              alertTimeout();
            }
          }
        })
      }
        function deleteTransaction(){
          var data = {
          'Transaction_id' : $('#transaction_id2').val(),
          'Transaction_type' : $('#transaction_type2').val(),
          };
          //console.log(data);
          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: "POST",
          url: "delete-transaction",
          data : data,
          dataType: "json",
          success: function (response){
              $('.delete_transaction').html("Yes Delete");
              $('#success-message').html("");
              $('#alert').removeClass('d-none');
              $('#success-message').text(response.message);
              $('#deletemodal').find('input[type="text"]').val("");
              $('#deletemodal').find('textarea').val("");
              $('#deletemodal').find('input[type="number"]').val("");
              $('#deletemodal').modal('hide');
              getTransaction();
              alertTimeout();
          }
        });
      }

      function saveTotheLord(){
        var data = {
          'type' : $('#tithes-offering').val(),
          };

          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: "POST",
          url: "save_totheLord",
          data : data,
          dataType: "json",
          success: function (response){
              //console.log(response)
              $('.saveTithes').html("Yes");
              $('#success-message').html("");
              $('#alert').removeClass('d-none');
              $('#success-message').text(response.message);
              $('#saveTotheLordModal').modal('hide');
              getTransaction();
              alertTimeout();
          }
        })
      }
        //setTimeout script
        function alertTimeout(){
          setTimeout(() => {
                $('#alert').fadeTo(500, 300).slideToggle(500, function(){
                  $('#alert').slideToggle(500);
                  $('#alert').addClass('d-none');
                });
              }, 5000);
        }

        function getTransaction(){
          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: "GET",
          url: "get-transactions",
          dataType: "json",
          success: function (response){
              if(response.status == 400){
                  $('#netIncome').html('0');
                  $('.notFound').html(response.message);
              }
            var totalIncome = 0;
            var totalExpense = 0;
            var totalTithes = 0;
            var curentTithes = 0;
            var currentOffering = 0;
            var totalOffering = 0;
            var $prop = "";
            //console.log(response.message)
            $.each(response.income, function (key, item){
                  totalIncome += item.Amount;
              });
              $('#totalIncome').html(totalIncome);
            $.each(response.expense, function (key, item){
                  totalExpense += item.Amount;
              });
              $('#totalExpense').html(totalExpense);
              //console.log(totalTithes);
            $.each(response.totheLord, function (key, item){
                curentTithes += item.tithes;
                currentOffering += item.offering;
              });
              $('#tithes').html(curentTithes);
              $('#tithesval').val(curentTithes);
              $('#offering').html(currentOffering);
              //console.log(curentTithes);
              //console.log(currentOffering);

            $('tbody').html("");
              $.each(response.transactions, function (key, item){
                if(item.disabled == 1){
                  //console.log(item.disabled)
                  $prop = 'disabled';
                }else{
                  $prop = '';
                }
                $('tbody').append('<tr>\
                <td style="display:none;">'+item.id+'</td>\
                <td>'+item.TransactionType+'</td>\
                <td>'+item.Description+'</td>\
                <td>'+item.Amount+'</td>\
                <td>'+item.tithes+'</td>\
                <td>'+item.offering+'</td>\
                <td>'+item.created_at+'</td>\
                <td><button type="button" title="edit" class="edit_btn btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal" '+$prop+'><i class="fa-solid fa-pen-to-square"></i></button>\
                  <button type="button" title="delete"  class="delete_btn btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodal" '+$prop+'><i class="fa-solid fa-trash"></i></button></td>\
                </tr>');
                totalTithes += item.tithes;
              });
              //Net income
              $netIncome = totalIncome - totalExpense - totalTithes;
              //console.log($netIncome);
              $('#netIncome').html($netIncome);
              
          }
        });
      }

        //buttons functionality
        $(document).on('click', '.add_income', function (e){
        e.preventDefault();
        $('.add_income').html("Adding..");
        addTransaction('.transaction_type', '.income_description', '.income_amount', 
        '#addIncomeModal', '#income-errors', '.add_income');
        });

        $(document).on('click', '.add_expense', function (e){
        e.preventDefault();
        $('.add_expense').html("Adding..");
        addTransaction('.transaction_type2', '.expense_description', '.expense_amount', 
        '#addExpenseModal', '#expense-errors', '.add_expense');
        });
        $(document).on('click', '.edit_transaction', function (e){
        e.preventDefault();
        $('.edit_transaction').html("Updating..");
        updateTransaction();
        });
        $(document).on('click', '.delete_transaction', function (e){
        e.preventDefault();
        $('.delete_transaction').html("Deleting..");
        deleteTransaction();
        });
        $(document).on('click', '.saveTithes', function (e){
        e.preventDefault();
        $('.saveTithes').html("saving...");
        saveTotheLord();
        });

        //Edit modal fill data
        $(document).on('click', '.edit_btn', function () {
          $('#editmodal').modal('show');
          $tr = $(this).closest('tr');
  
          var data = $tr.children("td").map(function () {
              return $(this).text();
            }).get();

            //console.log(data);
            $('#editType').html(data[1]);
            $('#transaction_id').val(data[0]);
            $('#transaction_type').val(data[1]);
            $('#description').val(data[2]);
            $('#amount').val(data[3]);
        });
        //Delete modal fill data
        $(document).on('click', '.delete_btn', function () {
          $('#deletemodal').modal('show');
          $tr = $(this).closest('tr');
  
          var data = $tr.children("td").map(function () {
              return $(this).text();
            }).get();

            //console.log(data);
            $('#transaction_id2').val(data[0]);
            $('#transaction_type2').val(data[1]);
        });

    });
  
  </script>

<script type="text/javascript">
  function updateClock(){
    var now = new Date();
    var dname = now.getDay(),
        mo = now.getMonth(),
        dnum = now.getDate(),
        yr = now.getFullYear(),
        hou = now.getHours(),
        min = now.getMinutes(),
        sec = now.getSeconds(),
        pe = "AM";
        if(hou >= 12){
          pe = "PM";
        }
        if(hou == 0){
          hou = 12;
        }
        if(hou > 12){
          hou = hou - 12;
        }

        Number.prototype.pad = function(digits){
          for(var n = this.toString(); n.length < digits; n = 0 + n);
          return n;
        }

        var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
        var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
        var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
        //console.log(ids.length)
        for(var i = 0; i < ids.length; i++)
        document.getElementById(ids[i]).firstChild.nodeValue = values[i];
  }
  function initClock(){
    updateClock();
    window.setInterval("updateClock()", 1);
  }
  </script>

  <script>
    //DataTable Script
      $(document).ready(function () {
    $('#myTable').DataTable({
        "scrollX": true,
        "scrollY": 300,
        "paging": false,
        "ordering": false,
    });
});
  </script>
@endsection