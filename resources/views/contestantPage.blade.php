@extends('layout')

@section ('content')
<div class="section section-shaped pt-2 pb-0">
    <div class="shape shape-style-3 shape-default">
        <span class="span-150"></span>
    </div>
    <div class="page-header">
        <div class="container shape-container d-flex align-items-center py-lg">
            <div class="col px-0">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 text-center">
                            <h3 class="display-4 font-weight-normal text-white">{{ $categoryname }}</h3>
                        <h1 class="text-white display-1">Nominees</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section features-6">
    <div class="container">
        <form class="" method="POST" action="{{ route('vote4contestant') }}">
            <div class="row">
                @if(session()->get('error'))
                <div class="alert alert-danger" role="alert" style="width: 100%;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Whoops!</strong> {{ session()->get('error')}} </strong>
                </div>
                @endif
                @if(session()->get('message'))
                <div class="alert alert-success" role="alert" style="width: 100%;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Yepee!</strong> {{ session()->get('message')}} </strong>
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-warning" role="alert" style="width: 100%;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach($errors->all() as $error)
                            {{ $error }}<br>
                    @endforeach
                </div>
@endif
                <div class="col-lg-12">
                    
                    @foreach ($contestants as $contestant)
                    <div class="form-check form-check-inline p-3">
                        <input class="form-check-input" type="radio" name="contestant_id" id="inlineRadio1" value="{{ $contestant->id }}">
                        <input type="hidden" value="{{ $contestant->contestantcat_id }}" name="contestantcat_id">
                       
                        <label class="form-check-label" for="inlineRadio1">{{ $contestant->name }}
                            {{-- @if(session()->get('message')){{ $contestant->votecount.' Votes' }} 
                            @endif  --}}
                        </label>
            
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-12 pt-4">
                    <button type="submit" class="btn btn-primary center">Cast Vote</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
</div>
<br />
<br />
@endsection