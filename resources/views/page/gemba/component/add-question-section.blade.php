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
                            <select class="form-select questionType" name="question[0][type]" id="">
                               <option value="">Select</option>
                               <option value="Text">Text</option>
                               <option value="Dropdown">Dropdown</option>
                               <option value="Checkbox">Checkbox</option>
                               <option value="Radio">Radio</option>
                            </select>
                         </div>
                         <div class="form-group mb-4">
                            <label class="form-label">Question label:</label>
                            <input type="text" class="form-control" name="question[0][label]">
                         </div>
                         <div class="form-group mb-4 list-of-ptions">
                            <label class="form-label">List of options (Separated by commas)</label>
                            <input type="text" class="form-control" name="question[0][list_option]">
                         </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>