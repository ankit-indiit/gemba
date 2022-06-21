@php
	$reflection = unserialize($gemba->formMeta('reflect_on_employee'));
@endphp
<div class="gembas-details-item view-refelection w-100">
	<div class="row">
		<div class="col-md-6 d-flex justify-content-left">
			<label class="">Attitude</label>
		 	<ul class="d-flex justify-content-left feedack-rating" id='stars'>
				@for ($i = 0; $i < @$reflection['attitude_star_rating']; $i++)
			      <li class='star leader' title='Poor' data-value='{{$i}}'>
			        <i class='fa fa-star fa-fw'></i>
			      </li>
				@endfor
		    </ul>			
		</div>
		<div class="col-md-6 d-flex justify-content-left">
			<label class="">Aptitude</label>			
		 	<ul class="d-flex justify-content-left feedack-rating" id='stars'>
				@for ($i = 0; $i < @$reflection['aptitude_star_rating']; $i++)
			      <li class='star leader' title='Poor' data-value='{{$i}}'>
			        <i class='fa fa-star fa-fw'></i>
			      </li>
				@endfor
		    </ul>
		</div>
	</div>
</div>
<div class="gembas-details-item w-100">
	Best words describing your leadership approach:
	@if (!empty($reflection['employee_behavior_tags']))
		@foreach (unserialize($reflection['employee_behavior_tags']) as $tag)
			<div class="gemba-details-value">
				<span>{{ $tag }}</span>
			</div>
		@endforeach
	@endif
</div>
<div class="gembas-details-item w-100">
	What one thing you could do better from today:
 	<div class="gemba-details-value">{{ @$reflection['employee_improving_thing'] }}</div>
</div>
<div class="gembas-details-item w-100">
	Further reflections
 	<div class="gemba-details-value">{{ @$reflection['employee_further_reflection'] }}</div>
</div>