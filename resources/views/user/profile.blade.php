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
                        <a class="dropdown-item active" href="profile"><i class="fa-solid fa-user-pen"></i> edit profile</a>
                        <a class="dropdown-item" href="settings"><i class="fa-solid fa-gear"></i> settings</a>
                        <a class="dropdown-item" href="logout"><i class="fa-solid fa-right-from-bracket"></i> logout</a>
                      </li>
                     </ul>
              </li>
            </ul>
    </div>
  </nav>
  
  <div class="container">
      <h1>This is Profile Page</h1>
  </div>
@endsection