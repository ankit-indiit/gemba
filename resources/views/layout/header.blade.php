<header id="myHeader" class="">
   <nav class="navbar navbar-expand-md navbar-dark p-0">
      <div class="container container-s">
         <a class="navbar-brand" href="index.php"><img src="{{ asset('assets/img/logo.png') }}"></a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <img src="{{ asset('assets/img/toggleNavbar.svg') }}">
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('develop-employee') }}">Develop Employee/ Team</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="{{ route('my-gembas') }}">My Gembas</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('how-to-gemba') }}">How To</a>
               </li>
               <li class="nav-item user-dropdown dropdown ms-md-5">
                  <a href="javascript:void(0)" class="dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="user-img"><i class="fa fa-user-o"></i></span></a>
                   <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="{{ route('account-nfo') }}"><i class="fa fa-sliders"></i> Account</a></li>
                      <li><a class="dropdown-item" href="login.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                   </ul>
               </li>
            </ul>
         </div>
      </div>
   </nav>
</header>