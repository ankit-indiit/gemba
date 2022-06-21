@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
@include('page.component.bread-crumb', [
    'title' => 'My '.str_replace("-", " ", ucfirst(Request::segment(2))),
    'previous_page' => route('my-reflection'),
    'page_title' => 'My Reflection'
]);
<section class="my-gembas-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="gembas-list-card">
                <div class="d-flex align-items-center justify-content-end gembas-search-top">
                    <div class="col-lg-6 col-md-8 col-12">
                        <form action="" method="GET">
                            <div class="d-flex align-items-center justify-content-end ">
                                <input type="date" name="start_date" value="{{ request()->start_date ? request()->start_date : '' }}" placeholder="From" class="form-control" id="gembaStartDate">
                                <span class="px-3">To</span>
                                <input type="date" name="end_date" value="{{ request()->end_date ? request()->end_date : '' }}" placeholder="To" class="form-control me-3" id="gembaEndDate">
                                <button type="submit" class="btn btn-primary btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>                                
                            </div>
                        </form>
                    </div>
                </div>
                <div class="gembas-list-profile">
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
                    </div>
                </div>                
                @if (count($reflections) > 0 )
                    @php
                        $title = Request::segment(2);                        
                    @endphp                
                    <div class="gembas-list-table">
                        <div class="table-responsive">
                            <table id="" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                       <th>Date</th>
                                       <th>Reflection Category</th>
                                       <th>Display</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach($reflections as $reflection)          
                                        <tr>
                                           <td>{{ dateFormat($reflection->created_at) }}</td>
                                           <td>{{ $reflection->form_name }}</td>
                                           <td>
                                              <a href="{{ route('my-reflection-detail', [$reflection->gemba_user_meta_id, $title]) }}" class="table-action-btn">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                              </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="gembas-table-action">
                            @if ($reflections->previousPageUrl())
                                <a class="btn-action me-2 {{ $reflections->previousPageUrl() ? '' : 'disabled' }}" href="{{ $reflections->previousPageUrl() }}">Previous </a>
                            @endif
                            @if ($reflections->nextPageUrl())                                
                                <a class="btn-action ms-2 {{ $reflections->nextPageUrl() ? '' : 'disabled' }}" href="{{ $reflections->nextPageUrl() }}">Next</a>
                            @endif                                                        
                        </div>
                    </div>
                @else
                    <div class="text-center">No data found!</div>
                @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
