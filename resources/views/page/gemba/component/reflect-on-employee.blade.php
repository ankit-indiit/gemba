<div  class="modal fade custom-modal-design" id="ReflectOnEmployee" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reflect on employee/team</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form class="row g-3" action="{{ route('reflect-on-employee') }}" method="POST" id="ReflectOnEmployeeForm">
         <div class="modal-body">
            <div class="add-form-div employeeReflectFormSec">
                  <div class="col-md-12">
                     <div class="form-group">                        
                        <label for="" class="form-label">Rate your perception from the employee</label>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="star-rating">
                                 <label>Attitude <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i>
                                 </label>
                                 <section class='rating-widget'>
                                   <div class='rating-stars text-center'>
                                      <input type="hidden" class="employeeStarRating" name="star_rating" id="" value="">
                                     <ul class="stars" id='stars'>
                                       <li class='star employee' title='Poor' data-value='1'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star employee' title='Fair' data-value='2'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star employee' title='Good' data-value='3'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star employee' title='Excellent' data-value='4'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star employee' title='WOW!!!' data-value='5'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                     </ul>
                                   </div>                                                  
                                 </section>
                              </div>
                           </div>                           
                        </div>                        
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">Reflect how did you do</label>
                        <textarea  rows="4" type="text" class="form-control" id="" name="refelection_on_employee" placeholder="Reflect how did you do"> </textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">Best words describing the employee behavior:</label>
                        <select data-placeholder="Select...." name="employee_behavior_tags[]" multiple class="chosen-select form-control">
                           <option value="Adaptability">Adaptability</option>
                           <option value="Honesty and integrity">Honesty and integrity</option>
                           <option value="Teamwork">Teamwork</option>
                           <option value="Willingness to learn and improve">Willingness to learn and improve</option>
                           <option value="Good work ethic">Good work ethic</option>
                           <option value="Humility">Humility</option>
                           <option value="Confidence">Confidence</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">Further reflections</label>
                        <input type="text" class="form-control" name="employee_further_reflection">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">What one thing you could do to improve their energy/engagement/life</label>
                        <input type="text" class="form-control" name="employee_improving_thing">
                     </div>
                  </div>
            </div>
            <div class="modal-bottom-msg employeeReflectSuccess"></div>
            <div class="modal-footer">
               <div class="form-group form-submit-action text-center">
                  <button type="button" class="submit-button cancel-btn" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                  <button type="submit" id="ReflectOnEmployeeFormBtn" class="submit-button">Submit</button>
               </div>
            </div>
         </div>
         </form>
      </div>
   </div>
</div>