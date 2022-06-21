@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
@include('page.component.bread-crumb', ['title' => 'My Gembas', 'page' => 'My Gembas'])
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
                    {{-- Gemba Ponts --}} 
                    @include('page.gemba.component.gemba-points-bar')
                </div>
                @if (count($gembas) > 0 )
                    <div class="gembas-list-table">
                        <div class="table-responsive">
                            <table id="" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                       <th>Gemba Date</th>
                                       <th>Gemba Category</th>
                                       <th>Time at Gemba</th>
                                       <th>Display</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach($gembas as $gemba)
                                    <tr>
                                       <td>{{ $gemba->created_at }}</td>
                                       <td>{{ $gemba->form_name }}</td>
                                       <td>{{ $gemba->formMeta('time_at_gemba') }}</td>
                                       <td>
                                          <a href="{{ route('gemba.edit', $gemba->id) }}" class="table-action-btn">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                          </a>
                                          <a href="{{ route('my-gemba.show', $gemba->id) }}" class="table-action-btn">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                          </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="gembas-table-action">
                            @if ($gembas->previousPageUrl())
                                <a class="btn-action me-2" href="{{ $gembas->previousPageUrl() }}">Previous </a>
                            @endif
                            @if ($gembas->nextPageUrl())                                
                                <a class="btn-action ms-2" href="{{ $gembas->nextPageUrl() }}">Next</a>
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
