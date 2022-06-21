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
                      <div class="col-md-10 questionsFields">
                        <input type="hidden" id="addQuesIndex" value="1">
                         <div class="form-group mb-4">
                            <label class="form-label">Type of question:</label>
                            <select class="form-select questionType" id="qusType">
                               <option value="">Select one</option>
                               <option value="Text" selected>Text</option>                               
                            </select>
                         </div>
                         <div class="form-group mb-4">
                            <label class="form-label">Question label:</label>
                            <input type="text" class="form-control" id="qusLabel">
                         </div>                         
                         <div class="form-group mb-4">
                            <label class="form-label">Comment</label>
                            <textarea class="form-control" id="qusCmnt" rows="3"></textarea>
                         </div>
                      </div>
                  </div>
              </div>
              <a href="javascript:void(0)" class="submitQuestions mb-2" type="button"> Submit </a>
          </div>
      </div>
  </div>
</div>