<div class="row ">
    <div class="col-md-8">
        <div class="update-profile d-flex">
            <img src="{{ Auth::user()->image }}" alt="">
            <div class="ms-4 mt-lg-3">
                <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                <span class="text-gray">{{ Auth::user()->description }}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 total-points-div">
        <h3 class="mb-0">Total points this month</h3>
        <div class="d-flex align-items-center">
            <a href="javascript:void(0);" class="btn-badge">{{ gembaPoints() }} </a> <i class="fa fa-info-circle ms-2" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i>
        </div>                     
    </div>
</div>