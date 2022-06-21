<div  class="modal fade custom-modal-design" id="ReflectOnEmployee" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reflect on employee/team</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form class="" action="{{ route('reflect-on-employee') }}" method="POST" id="ReflectOnEmployeeForm">
         <div class="modal-body">
              @php
                if (isset($gemba)) {
                  $reflections = unserialize($gemba->formMeta('reflect_on_employee'));
                  $bestWords = unserialize($reflections['employee_behavior_tags']);
                } else {
                  $reflections = [];
                  $bestWords = [];
                }
              @endphp
            <div class="add-form-div employeeReflectFormSec">
                <div class="row g-3">
                   <div class="col-md-12">
                     <div class="form-group">                        
                        <label for="" class="form-label">Rate your perception from the employee</label>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="star-rating">
                                 <label>Attitude <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" title="a feeling or opinion about something or someone, or a way of behaving that is caused by this" data-bs-placement="bottom" title="Tooltip on bottom"></i>
                                 </label>
                                 <div class='rating-widget'>
                                   <div class='rating-stars text-center'>
                                      <input type="hidden" class="employeeAttitudeRating" name="attitude_star_rating" id="" value="{{ @$reflections['attitude_star_rating'] }}">
                                     <ul class="stars" id='stars'>
                                       <li class='star attitude' title='Poor' data-value='1'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star attitude' title='Fair' data-value='2'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star attitude' title='Good' data-value='3'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star attitude' title='Excellent' data-value='4'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star attitude' title='WOW!!!' data-value='5'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                     </ul>
                                   </div>                                                  
                                 </div>
                              </div>
                           </div> 
                           <div class="col-md-6">
                              <div class="star-rating">
                                 <label>Aptitude <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="a natural ability to do something"></i>
                                 </label>
                                 <div class='rating-widget'>
                                   <div class='rating-stars text-center'>
                                      <input type="hidden" class="employeeAptitudeRating" name="aptitude_star_rating" id="" value="{{ @$reflections['aptitude_star_rating'] }}">
                                     <ul class="stars" id='stars'>
                                       <li class='star aptitude' title='Poor' data-value='1'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star aptitude' title='Fair' data-value='2'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star aptitude' title='Good' data-value='3'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star aptitude' title='Excellent' data-value='4'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                       <li class='star aptitude' title='WOW!!!' data-value='5'>
                                         <i class='fa fa-star fa-fw'></i>
                                       </li>
                                     </ul>
                                   </div>                                                  
                                 </div>
                              </div>
                           </div>                           
                        </div>                        
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">Best words describing the employee behavior:</label>
                        <select data-placeholder="Select...." name="employee_behavior_tags[]" multiple class="chosen-select form-control">
                           <option {{ @in_array("Adaptability", $bestWords) ? 'selected' : '' }} value="Adaptability">Adaptability</option>
                           <option {{ @in_array("Honesty and integrity", @$bestWords) ? 'selected' : '' }} value="Honesty and integrity">Honesty and integrity</option>
                           <option {{ @in_array("Teamwork", @$bestWords) ? 'selected' : '' }} value="Teamwork">Teamwork</option>
                           <option {{ @in_array("Willingness to learn and improve", @$bestWords) ? 'selected' : '' }} value="Willingness to learn and improve">Willingness to learn and improve</option>
                           <option {{ @in_array("Good work ethic", @$bestWords) ? 'selected' : '' }} value="Good work ethic">Good work ethic</option>
                           <option {{ @in_array("Humility", @$bestWords) ? 'selected' : '' }} value="Humility">Humility</option>
                           <option {{ @in_array("Confidence", @$bestWords) ? 'selected' : '' }} value="Confidence">Confidence</option>
                           <option {{ @in_array("Dependability", @$bestWords) ? 'selected' : '' }} value="Dependability">Dependability</option>
                           <option {{ @in_array("Proactiveness", @$bestWords) ? 'selected' : '' }} value="Proactiveness">Proactiveness</option>
                           <option {{ @in_array("Communication", @$bestWords) ? 'selected' : '' }} value="Communication">Communication</option>
                           <option {{ @in_array("Motivated Negative", @$bestWords) ? 'selected' : '' }} value="Motivated Negative">Motivated Negative</option>
                           <option {{ @in_array("Negativity", @$bestWords) ? 'selected' : '' }} value="Negativity">Negativity</option>
                           <option {{ @in_array("Failure to complete work/assignments", @$bestWords) ? 'selected' : '' }} value="Failure to complete work/assignments">Failure to complete work/assignments</option>
                           <option {{ @in_array("Disrespectful or abusive behavior", @$bestWords) ? 'selected' : '' }} value="Disrespectful or abusive behavior">Disrespectful or abusive behavior</option>
                           <option {{ @in_array("Uncooperative or domineering behavior", @$bestWords) ? 'selected' : '' }} value="Uncooperative or domineering behavior">Uncooperative or domineering behavior</option>
                           <option {{ @in_array("Failure to provide constructive feedback", @$bestWords) ? 'selected' : '' }} value="Failure to provide constructive feedback">Failure to provide constructive feedback</option>
                           <option {{ @in_array("Whining", @$bestWords) ? 'selected' : '' }} value="Whining">Whining</option>
                           <option {{ @in_array("Poorly prepared", @$bestWords) ? 'selected' : '' }} value="Poorly prepared">Poorly prepared</option>
                           <option {{ @in_array("Subversive behavior", @$bestWords) ? 'selected' : '' }} value="Subversive behavior">Subversive behavior</option>
                           <option {{ @in_array("Unmotivated", @$bestWords) ? 'selected' : '' }} value="Unmotivated">Unmotivated</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">What one thing you could do to improve their energy/engagement/life</label>
                        <input
                          type="text" 
                          class="form-control"
                          name="employee_improving_thing"
                          value="{{ @$gemba ? $reflections['employee_improving_thing'] : '' }}"
                        >
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">Further reflections</label>
                        <textarea rows="3" type="text" class="form-control" name="employee_further_reflection" placeholder="Further reflections">{{ @$gemba ? $reflections['employee_further_reflection'] : ''}}
                        </textarea>
                     </div>
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