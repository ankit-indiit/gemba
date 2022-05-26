@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
<section class="breadcrumb-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <div class="banner-text">
               <h1>My Gembas</h1>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                     <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">My Gembas</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- breadcrumb End -->
<!-- breadcrumb Start -->
<section class="my-gembas-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="gembas-list-card">
               <div class="d-flex align-items-center justify-content-end gembas-search-top">
                  <div class="col-lg-6 col-md-8 col-12">
                     <div class="d-flex align-items-center justify-content-end ">
                        <input type="" placeholder="From" class="form-control me-3">
                        <input type="" placeholder="To" class="form-control me-3">
                        <button type="button" class="btn btn-primary btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                     </div>
                  </div>
               </div>
               <div class="gembas-list-profile">
                  <div class="row ">
                    <div class="col-md-8">
                      <div class="update-profile d-flex">
                        <img src="https://jobick.dexignlab.com/xhtml/images/profile/pic1.jpg" alt="">
                        <div class="ms-4 mt-lg-3">
                          <h3 class="mb-0">Franklin Jr</h3>
                          <span class="text-gray">Lorem Ipsum is simply dummy text </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 total-points-div">
                      <h3 class="mb-0">Total points this month</h3>
                      <div class="d-flex align-items-center">
                         <a href="javascript:void(0);" class="btn-badge">63 </a> <i class="fa fa-info-circle ms-2" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i>
                      </div>
                     
                    </div>
                  </div>
               </div>
               <div class="gembas-list-table">
                  <div class="table-responsive">
                  <table id="" class="table" style="width:100%">
                     <thead>
                        <tr>
                           <th>Gemba Date</th>
                           <th>Gemba Category</th>
                           <th>Time at Gemba</th>
                           <th>Display</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>25 Feb 22</td>
                           <td>My role is important</td>
                           <td>25</td>
                           <td><a href="{{ route('hsse-leader-detail') }}" class="table-action-btn"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                         <tr>
                           <td>26 Feb 22</td>
                           <td>Voice of the customer</td>
                           <td>64</td>
                           <td><a href="{{ route('hsse-leader-detail') }}" class="table-action-btn"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                         <tr>
                           <td>27 Feb 22</td>
                           <td>My role is important</td>
                           <td>43</td>
                           <td><a href="{{ route('hsse-leader-detail') }}" class="table-action-btn"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                         <tr>
                           <td>28 Feb 22</td>
                           <td>Voice of the customer</td>
                           <td>52</td>
                           <td><a href="{{ route('hsse-leader-detail') }}" class="table-action-btn"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
                  <div class="gembas-table-action">
                    <a class="btn-action me-2" href="#">Previous </a>
                    <a class="btn-action ms-2" href="#">Next</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
      
@endsection
