<section class="breadcrumb-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <div class="banner-text">
               <h1>{{ $title }}</h1>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                     <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                     @if (isset($previous_page))
                        <li class="breadcrumb-item">
                           <a href="{{ $previous_page }}">{{ $page_title }}</a>
                        </li>
                     @endif
                     <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>