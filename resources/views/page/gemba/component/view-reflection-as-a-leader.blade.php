@php
	$reflection = unserialize($gemba->formMeta('reflection_as_a_leader'));
@endphp
<div class="gembas-details-item view-refelection w-100">
	Rate how did you do at gemba
	<ul class="d-flex justify-content-left feedack-rating" id='stars'>
		@for ($i = 0; $i < $reflection['star_rating']; $i++)
	      <li class='star leader' title='Poor' data-value='1'>
	        <i class='fa fa-star fa-fw'></i>
	      </li>
		@endfor
    </ul>
</div>
<div class="gembas-details-item w-100">
	Best words describing your leadership approach:
	@if (!empty($reflection['leader_approach_tag']))
		@foreach (unserialize($reflection['leader_approach_tag']) as $tag)
			<div class="gemba-details-value">
				<span>{{ $tag }}</span>
			</div>
		@endforeach
	@endif
</div>
<div class="gembas-details-item w-100">
	What one thing you could do better from today:
 	<div class="gemba-details-value">{{ @$reflection['leader_today_better_thing'] }}</div>
</div>
<div class="gembas-details-item w-100">
	Further Reflection
 	<div class="gemba-details-value">{{ @$reflection['further_reflection'] }}</div>
</div>