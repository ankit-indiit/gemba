@extends('layout.master')
@section('content')	
@include('page.component.bread-crumb', [
   'title' => 'Leaders at Gemba App information'
])

<section class="develope-section section-gap leaderbox">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="version_info_div">
               <p><span class="version_head">App version:</span> <span class="version_detail">1.0</span></p>
               <p><span class="version_head">Last Updated:</span> <span class="version_detail">22/03/2022</span></p>
               <p><span class="version_head">Created by:</span> <span class="version_detail"><b>Lean consultants </b>Building high performance teams and self-developing leaders in organisations</span></p>
            </div>
         </div>
         <div class="col-md-12">
            <h4 class="version_app_share">Please, share your contributions to the improvement of this App.</h2>
             <div class="form-group">   
                 <label for="" class="form-label">Suggestion</label>
                 <textarea type="text" rows="4" class="form-control" name="observation_training_need" id=""></textarea>
             </div>
            <div class="form-group">
               <button type="submit" class="version_submit_btn">Rate our app</button>
            </div>                               
         </div>   
      </div>   
   </div>   
</section>
@endsection
