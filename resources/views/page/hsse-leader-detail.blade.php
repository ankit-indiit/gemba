@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
<section class="breadcrumb-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <div class="banner-text">
               <h1>HSSE Leader Details</h1>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                     <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                     <li class="breadcrumb-item"><a href="my-gembas.php">My Gembas</a></li>
                     <li class="breadcrumb-item active" aria-current="page">HSSE Leader Details</li>
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
               <div class="gembas-list-profile">
                  <div class="row">
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
               <div class="gembas-details">
                  <div class="gembas-details-item">
                     Date 
                     <div class="gemba-details-value">14-May-2022</div>
                  </div>
                  <div class="gembas-details-item">
                     Hour 
                     <div class="gemba-details-value">2 Hours</div>
                  </div>
                  <div class="gembas-details-item">
                     Team Name 
                     <div class="gemba-details-value">My role is important </div>
                  </div>
                  <div class="gembas-details-item">
                     Time at Gemba 
                     <div class="gemba-details-value"> 12:05 PM</div>
                  </div>
                  <div class="gembas-details-item">
                     Function observed 
                     <div class="gemba-details-value">Sed ut perspiciatis</div>
                  </div>
                  <div class="gembas-details-item">
                     Gemba located in 
                     <div class="gemba-details-value">Lorem Ipsum</div>
                  </div>
                  <div class="gembas-details-item">
                     Can the team list their job risks? 
                     <div class="gemba-details-value">Yes</div>
                  </div>
                  <div class="gembas-details-item">
                     Have you and the team identified any hazards in the workplace?  
                     <div class="gemba-details-value">No</div>
                  </div>
                   <div class="gembas-details-item gembas-question-details  w-100">
                    Questions
                    <div class="Questions-lists">
                       <ul>
                          <li> <label>Type of question</label>
                              <span>Sed ut perspiciatis unde omnis</span>
                           </li>
                            <li> <label>Question label:</label>
                              <span>At vero eos et accusamus</span>
                           </li>
                            <li> <label>List of options</label>
                              <span>5,7,9</span>
                           </li>
                       </ul>
                    </div>
                     <div class="Questions-lists">
                       <ul>
                          <li> <label>Type of question</label>
                              <span>Sed ut perspiciatis unde omnis</span>
                           </li>
                            <li> <label>Question label:</label>
                              <span>At vero eos et accusamus</span>
                           </li>
                            <li> <label>List of options</label>
                              <span>5,7,9</span>
                           </li>
                       </ul>
                    </div>
                     <div class="Questions-lists">
                       <ul>
                          <li> <label>Type of question</label>
                              <span>Sed ut perspiciatis unde omnis</span>
                           </li>
                            <li> <label>Question label:</label>
                              <span>At vero eos et accusamus</span>
                           </li>
                            <li> <label>List of options</label>
                              <span>5,7,9</span>
                           </li>
                       </ul>
                    </div>
                  </div>
                  <div class="gembas-details-item" >
                     Hazards identified with the team in their workplace: 
                     <div class="gemba-details-value"><span>Ladders</span> <span>Scaffolding</span> <span>Falling Objects</span></div>
                  </div>
                    <div class="gembas-details-item">
                     Type any other hazard found at their workplace: 
                     <div class="gemba-details-value">consectetur adipiscing </div>
                  </div>
                    <div class="gembas-details-item w-100">
                    Observations and/or Training Needs
                     <div class="gemba-details-value">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                  </div>
                    <div class="gembas-details-item w-100">
                    Improvements agreed with the team: 
                     <div class="gemba-details-value">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</div>
                  </div>
                    <div class="gembas-details-item w-100">
                     Responsible for implementing the improvements and date to make them
                     <div class="gemba-details-value">righteous indignation <span>12-May-2022</span></div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
