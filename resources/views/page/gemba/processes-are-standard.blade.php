@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
<section class="breadcrumb-section">
 <div class="container">
    <div class="row">
       <div class="col-lg-10 offset-lg-1">
          <div class="banner-text">
             <h1>Processes are standard</h1>
             <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                   <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Processes are standard</li>
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
             <h2 class="section-title"><strong>Gemba Purpose:</strong> Coach team the value of procedures documented with standard quality and stakeholders are following them step by step</h2>
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
                      <label for="" class="form-label">Time spent in Gemba(minutes)</label>
                      <input type="text" class="form-control" id="">
                      </div>
                 
                </div>
                 <div class="col-md-6">
                     <div class="form-group">
                      <label for="" class="form-label">Function of the area visited</label>
                         <select class="form-select form-control" aria-label="Default select example">
                           <option selected>Select 1</option>
                           <option value="1">One</option>
                           <option value="2">Two</option>
                           <option value="3">Three</option>
                         </select>
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
                           <label for="" class="form-label w-100 mb-3">Documents available?</label>
                            <div class="checkbox-group">
                                <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                              <label class="form-check-label" for="inlineCheckbox1">SOP <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                              <label class="form-check-label" for="inlineCheckbox2">Checklist <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                            </div>
                             <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2">
                              <label class="form-check-label" for="inlineCheckbox3">Flowchart <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                            </div>
                             <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option2">
                              <label class="form-check-label" for="inlineCheckbox4">Working instructions <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                            </div>
                            </div>
                        
                     </div>
                
                </div>
                 <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Updated documents in less than 1 year?</label>
                         <div class="from-radio-box">
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
                </div>
                 <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Does the procedure have a skill matrix associated? <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                         <div class="from-radio-box">
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio5" value="option1">
                        <label class="form-check-label" for="inlineRadio5">Yes</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio6" value="option2">
                        <label class="form-check-label" for="inlineRadio6">No</label>
                      </div>
                   </div>
                     </div>
                </div>
                <div class="col-md-12">
                     <div class="form-group ">
                         <h5 class="mb-3">Observe Process</h5>
                        <label for="" class="form-label mb-3"">Are all the steps of the procedure followed?</label>
                        <div class="from-radio-box">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio7" value="option1">
                              <label class="form-check-label" for="inlineRadio7">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio8" value="option2">
                              <label class="form-check-label" for="inlineRadio8">Yes, in order</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio9" value="option3">
                              <label class="form-check-label" for="inlineRadio9">Yes, but not in order</label>
                            </div>
                        </div>
                           
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
                      <label for="" class="form-label">Observations and training needs:</label>
                      <textarea type="text" class="form-control" id=""></textarea>
                      </div>
                </div>

                 <div class="col-md-12">
                     <div class="form-group">   
                      <label for="" class="form-label">Improvements agreed with the process stakeholders:</label>
                      <textarea type="text" class="form-control" id=""></textarea>
                      </div>
                </div>

                 <div class="col-md-12">
                     <div class="form-group">   
                      <label for="" class="form-label">Responsible for implementing the improvements and date to complete them:</label>
                      <div class="row">
                          <div class="col-md-8"> 
                              <select class="form-select form-control" aria-label="Default select example">
                               <option selected>Combo box</option>
                               <option value="1">One</option>
                               <option value="2">Two</option>
                               <option value="3">Three</option>
                         </select>
                          </div>
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
