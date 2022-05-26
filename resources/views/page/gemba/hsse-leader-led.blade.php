@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
<section class="breadcrumb-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1">
            <div class="banner-text">
               <h1>HSSE Leader Led</h1>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                     <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">HSSE Leader Led</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- breadcrumb End -->
<!-- breadcrumb Start -->
<section class="add-gemba-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1 mb-4">
            <div class="section-intro text-center">
               <h2 class="section-title"><strong>Purpose:</strong> Coach the importance of awareness of risks of accident in the workplace</h2>
            </div>
         </div>
         <div class="col-lg-10 offset-lg-1">
            <div class="add-form-div">
               <form class="row g-4">
                  <div class="col-md-4">
                        <div class="form-group">
                           <label for="" class="form-label">Date</label>
                            <input type="date" class="form-control" id="">
                        </div>
                     
                  </div>
                  <div class="col-md-4 offset-md-4">
                       <div class="form-group">  
                        <label for="" class="form-label">Time</label>
                        <input type="time" class="form-control" id="">
                     </div>
                   
                  </div>
                  <div class="col-md-6">
                       <div class="form-group"> 
                        <label for="" class="form-label">Team Name</label>
                       <input type="text" class="form-control" id="">
                      </div>
                   
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">  
                        <label for="" class="form-label">Time at Gemba (minutes)</label>
                        <input type="text" class="form-control" id="">
                        </div>
                   
                  </div>
                   <div class="col-md-6">
                       <div class="form-group">
                        <label for="" class="form-label">Function observed</label>
                         <input type="text" class="form-control" id="">
                        </div>
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                           <label for="" class="form-label">Gemba located in</label>
                           <input type="text" class="form-control" id="">
                        </div>
                  </div>
                  <div class="col-md-12">
                       <div class="form-group">
                             <label for="" class="form-label w-100 mb-3">Can the team list their job risks?</label>
                    <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                       <label class="form-check-label" for="inlineRadio1">Yes</label>
                     </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                       <label class="form-check-label" for="inlineRadio2">No</label>
                     </div>
                       </div>
                  
                  </div>
                   <div class="col-md-12">
                       <div class="form-group">
                          <label for="" class="form-label w-100 mb-3">Have you and the team identified any hazards in the workplace?</label>
                       <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio3" value="option1">
                          <label class="form-check-label" for="inlineRadio3">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio4" value="option2">
                          <label class="form-check-label" for="inlineRadio4">No</label>
                        </div>
                       </div>
                  </div>
                  <div class="col-md-6">
                       <div class="form-group">
                          <label for="" class="form-label">Select the hazards identified with the team in their workplace:</label>
                      <select data-placeholder="Select...." name="tags[]" multiple class="chosen-select form-control">
                            <option value="Hazardous Chemicals">Hazardous Chemicals</option>
                            <option value="Ladders">Ladders</option>
                            <option value="Scaffolding">Scaffolding</option>
                            <option value="Vehicle Acciddents">Vehicle Acciddents</option>
                            <option value="Respiratory Hazards">Respiratory Hazards</option>
                            <option value="Electrical Wiring">Electrical Wiring</option>
                            <option value="Machinery  Malfunction">Machinery  Malfunction</option>
                            <option value="Falling Objects">Falling Objects</option>
                            <option value="Slippery/Wet Floors">Slippery/Wet Floors</option>
                            <option value="Poor Housekeeping">Poor Housekeeping</option>
                          </select>
                       </div>
                     
                  </div>

                   <div class="col-md-6">
                       <div class="form-group">   
                        <label for="" class="form-label">Type any other hazard found at their workplace:</label>
                        <input type="text" class="form-control" id="">
                        </div>
                 
                  </div>

                    <div class="col-md-12" >
                       <div class="form-group">
                          <div class="add-question-tp">
                            <label for="" class="form-label">Add questions of my own? </label>
                                 <a href="javascript:void(0)" class="addQuestions" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Add </a>
                           </div>
                           <div class="add-qstn-append"> 
                               <div class="form-question-btm">
                                    <a href="javascript:void(0)" class="removeQuestions" type="button"> Remove </a>
                                    <div class="accordion-body">
                                       <div class="row">
                                          <div class="col-md-10">
                                                 <div class="form-group mb-4">
                                                   <label class="form-label">Type of question:</label>
                                                   <select class="form-select" >
                                        
                                         <option value="1">One</option>
                                         <option value="2">Two</option>
                                         <option value="3">Three</option>
                                       </select>
                                               </div>
                                               <div class="form-group mb-4">
                                                   <label class="form-label">Question label:</label>
                                                   <input type="text" class="form-control" name="">
                                               </div>
                                               <div class="form-group mb-4">
                                                   <label class="form-label">List of options (Separated by commas)</label>
                                                   <input type="text" class="form-control" name="">
                                               </div>
                                          </div>
                                       </div>
                                     
                                    </div>
                              </div> 
                           </div>
                                  
                       </div>
                   
                     
                  </div>
                   <div class="col-md-12">
                       <div class="form-group">   
                        <label for="" class="form-label">Observations and/or Training Needs</label>
                        <input type="text" class="form-control" id="">
                        </div>
                 
                  </div>
                   <div class="col-md-12">
                       <div class="form-group">   
                        <label for="" class="form-label">Improvements agreed with the team:</label>
                          <textarea type="text" class="form-control" id=""></textarea>
                        </div>
                 
                  </div> 

                   <div class="col-md-12">
                       <div class="form-group">   
                        <label for="" class="form-label">Responsible for implementing the improvements and date to make them</label>
                        <div class="row">
                           <div class="col-md-8">  <input type="text" class="form-control" id=""></div>
                            <div class="col-md-4 mt-md-0 mt-3">
                                 <input type="date" class="form-control" id="">
                            </div>
                        </div>
                         
                        </div>
                 
                  </div>
                 
                  <div class="col-12">
                      <div class="modal-btn-group">
                             <button type="button" class="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              My own reflection as a leader
                              </button>
                               <button type="button" class="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                              Reflect on employee/team behavior
                              </button>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group form-submit-action text-center">
                         <button type="button" class="submit-button">
                             Submit
                        </button>                      
                      </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
