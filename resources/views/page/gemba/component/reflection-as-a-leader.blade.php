<div  class="modal fade custom-modal-design" id="ReflectionAsaLeader" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content" >
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">My own reflection as a leader</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form class="" action="{{ route('leader-reflection') }}" method="POST" id="leaderReflectionForm">
            @php
              if (isset($gemba)) {
                $reflections = unserialize($gemba->formMeta('reflection_as_a_leader'));
                $leaderApproachTag = unserialize($reflections['leader_approach_tag']);                
              } else {
                $reflections = [];
                $leaderApproachTag = [];
              }
            @endphp
         <div class="modal-body">
            <div class="add-form-div leaderReflectionFormSec">
                <div class="row g-3">
                  <div class="col-md-12">
                     <div class="form-group">        
                        <label for="" class="form-label">Rate how did you do at gemba</label>
                        <section class='rating-widget'>
                          <div class='rating-stars text-center'>
                            <input type="hidden" class="leaderStarRating" name="star_rating" id="" value="{{ @$reflections['star_rating'] }}">
                            <ul id='stars'>
                              <li class='star leader' title='Poor' data-value='1'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star leader' title='Fair' data-value='2'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star leader' title='Good' data-value='3'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star leader' title='Excellent' data-value='4'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                              <li class='star leader' title='WOW!!!' data-value='5'>
                                <i class='fa fa-star fa-fw'></i>
                              </li>
                            </ul>
                          </div>                                                  
                        </section>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">Best words describing your leadership approach:</label>
                        <select data-placeholder="Select...." name="leader_approach_tag[]" multiple class="chosen-select form-control">
                           <option value="All empowering">All empowering</option>
                           <option {{ @in_array("Analytical", $leaderApproachTag) ? 'selected' : '' }} value="Analytical">Analytical</option>
                           <option {{ @in_array("Collaborative", $leaderApproachTag) ? 'selected' : '' }} value="Collaborative">Collaborative</option>
                           <option {{ @in_array("Creative", $leaderApproachTag) ? 'selected' : '' }} value="Creative">Creative</option>
                           <option {{ @in_array("Dedicated", $leaderApproachTag) ? 'selected' : '' }} value="Dedicated">Dedicated</option>
                           <option {{ @in_array("Detail Oriented", $leaderApproachTag) ? 'selected' : '' }} value="Detail Oriented">Detail Oriented</option>
                           <option {{ @in_array("Diplomatic", $leaderApproachTag) ? 'selected' : '' }} value="Diplomatic">Diplomatic</option>
                           <option {{ @in_array("Engaged", $leaderApproachTag) ? 'selected' : '' }} value="Engaged">Engaged</option>
                           <option {{ @in_array("Enthusiastic", $leaderApproachTag) ? 'selected' : '' }} value="Enthusiastic">Enthusiastic</option>
                           <option {{ @in_array("Ethical", $leaderApproachTag) ? 'selected' : '' }} value="Ethical">Ethical</option>
                           <option {{ @in_array("Flexible", $leaderApproachTag) ? 'selected' : '' }} value="Flexible">Flexible</option>
                           <option {{ @in_array("Good communicator", $leaderApproachTag) ? 'selected' : '' }} value="Good communicator">Good communicator</option>
                           <option {{ @in_array("Inquisitive", $leaderApproachTag) ? 'selected' : '' }} value="Inquisitive">Inquisitive</option>
                           <option {{ @in_array("Inspirational", $leaderApproachTag) ? 'selected' : '' }} value="Inspirational">Inspirational</option>
                           <option {{ @in_array("Mediator", $leaderApproachTag) ? 'selected' : '' }} value="Mediator">Mediator</option>
                           <option {{ @in_array("Non judgemental", $leaderApproachTag) ? 'selected' : '' }} value="Non-judgemental">Non-judgemental</option>
                           <option {{ @in_array("Passionate", $leaderApproachTag) ? 'selected' : '' }} value="Passionate">Passionate</option>
                           <option {{ @in_array("Perceptive", $leaderApproachTag) ? 'selected' : '' }} value="Perceptive">Perceptive</option>
                           <option {{ @in_array("Positive", $leaderApproachTag) ? 'selected' : '' }} value="Positive">Positive</option>
                           <option {{ @in_array("Powerful", $leaderApproachTag) ? 'selected' : '' }} value="Powerful">Powerful</option>
                           <option {{ @in_array("Proactive", $leaderApproachTag) ? 'selected' : '' }} value="Proactive">Proactive</option>
                           <option {{ @in_array("Respectful", $leaderApproachTag) ? 'selected' : '' }} value="Respectful">Respectful</option>
                           <option {{ @in_array("Responsive", $leaderApproachTag) ? 'selected' : '' }} value="Responsive">Responsive</option>
                           <option {{ @in_array("Supportive", $leaderApproachTag) ? 'selected' : '' }} value="Supportive">Supportive</option>
                           <option {{ @in_array("Tolerant", $leaderApproachTag) ? 'selected' : '' }} value="Tolerant">Tolerant</option>
                           <option {{ @in_array("Virtuous", $leaderApproachTag) ? 'selected' : '' }} value="Virtuous">Virtuous</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">What one thing you could do better from today?</label>
                        <input type="text" name="leader_today_better_thing" class="form-control" value="{{ @$gemba ? $reflections['leader_today_better_thing'] : '' }}">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">Further reflections</label>
                        <textarea  rows="4" type="text" class="form-control" id="" name="further_reflection" placeholder="Further reflections">{{ @$gemba ? $reflections['further_reflection'] : ''}}</textarea>
                     </div>
                  </div>
                </div>
                  
            </div>
            <div class="modal-bottom-msg leaderReflectionSuccess"></div>
            <div class="modal-footer">
               <div class="form-group form-submit-action text-center">
                  <button type="button" class="submit-button cancel-btn" data-bs-dismiss="modal" aria-label="Close">
                  Cancel
                  </button>
                  <button type="submit" id="leaderReflectionBtn" class="submit-button">Submit</button>
               </div>
            </div>
         </div>
         </form>
      </div>
   </div>
</div>