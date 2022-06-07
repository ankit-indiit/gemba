<div  class="modal fade custom-modal-design" id="ReflectionAsaLeader" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content" style="padding: 20px 40px;">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">My own reflection as a leader</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form class="row g-3" action="{{ route('leader-reflection') }}" method="POST" id="leaderReflectionForm">
         @csrf
         <div class="modal-body">
            <div class="add-form-div leaderReflectionFormSec">
                  <div class="col-md-12">
                     <div class="form-group">        
                        <label for="" class="form-label">Rate how did you do at gemba</label>
                        <section class='rating-widget'>
                          <div class='rating-stars text-center'>
                            <input type="hidden" class="leaderStarRating" name="star_rating" id="" value="">
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
                        <label for="" class="form-label">Reflect how did you do</label>
                        <textarea  rows="4" type="text" class="form-control" id="" name="leader_reflection" placeholder="Reflect how did you do"> </textarea>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">Best words describing your leadership approach:</label>
                        <select data-placeholder="Select...." name="leader_approach_tag[]" multiple class="chosen-select form-control">
                           <option value="All empowering">All empowering</option>
                           <option value="Analytical">Analytical</option>
                           <option value="Collaborative">Collaborative</option>
                           <option value="Creative">Creative</option>
                           <option value="Dedicated">Dedicated</option>
                           <option value="Detail Oriented">Detail Oriented</option>
                           <option value="Diplomatic">Diplomatic</option>
                           <option value="Engaged">Engaged</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label">What one thing you could do better from today?</label>
                        <input type="text" name="leader_today_better_thing" class="form-control">
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