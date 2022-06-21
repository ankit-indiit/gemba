<header id="myHeader" class="">
   <nav class="navbar navbar-expand-md navbar-dark p-0">
      <div class="container container-s">
         <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.png') }}"></a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <img src="{{ asset('assets/img/toggleNavbar.svg') }}">
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('leader-at-gemba') }}">Leader at gemba</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Employee at gemba</a>
               </li>
               {{-- <li class="nav-item">
                 <a class="nav-link" href="{{ route('my-gemba.index') }}">My Gembas</a>
               </li> --}}
               <li class="nav-item">
                  {{-- <a class="nav-link" href="{{ route('how-to-gemba') }}">How To</a> --}}
               </li>
               <li class="nav-item user-dropdown dropdown ms-md-5">
                  <a href="javascript:void(0)" class="dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="user-img">
                      @if (Auth::user())
                        <img src="{{ @Auth::user()->image }}">
                      @else
                        <i class="fa fa-user-o"></i></span>
                      @endif
                    </span>
                  </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      @if (Auth::user())
                        <li><a class="dropdown-item" href="{{ route('account-info') }}"><i class="fa fa-sliders"></i> Account</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                              @csrf
                              <button type="submit" class="dropdown-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</button>                            
                            </form>
                        </li>
                      @else
                        <li>
                          <a class="dropdown-item" href="{{ route('login') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Log In</a>
                        </li>
                      @endif
                   </ul>
               </li>
            </ul>
         </div>
      </div>
   </nav>
</header>