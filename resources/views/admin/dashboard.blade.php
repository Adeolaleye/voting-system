@extends('layout')

@section ('content')
    <section class="section-profile-cover section-shaped my-0">
      <!-- Circles background -->
      <img class="bg-image" src="{{ asset ('assets/img/dashboard.jpg') }}" style="width: 100%;">
    </section>
    <section class="section bg-secondary">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="javascript:;">
                    <img src="{{ asset ('assets/img/avater.png') }}" class="rounded-circle admin-img" >
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-1 mt-lg-0">
                  <a href="addcategory" class="btn btn-md btn-primary mr-4 mb-4 mt-2"><i class="ni ni-fat-add pt-1"></i> Category</a>
                  <a href="addnominees" class="btn btn-md btn-default float-right mt-2"> <i class="ni ni-fat-add pt-1"></i> Nominee</a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div class="count">
                    <span class="heading">{{ $categories_count }}</span>
                    <span class="description">Categories</span>
                  </div>
                  <div class="count">
                    <span class="heading">{{ $nominess_count}}</span>
                    <span class="description">Nominees</span>
                  </div>
                  <div class="count">
                    <span class="heading">{{ $voters_count }}</span>
                    <span class="description">Voters</span>
                  </div>
                  <div class="count">
                    <span class="heading">{{ $bookedsits_count }}</span>
                    <span class="description">Booked Sit</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt-6">
              <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>Welcome Admin</div>
              <h2><strong>Voting Result</strong></h2>
              <span class="font-weight-light">Total number of votes are {{ $vote_count }}</span><br>
              <a href="#reserve" class="font-weight-light">View Sit Reservation Details</a>
            </div>
            <hr>
            <div class="row">
              {{-- <div class="col-lg-12"><h2 class="title display-3 text-center">Voting Result</h2></div> --}}
              @foreach($conts as $cont)  
              <div class="col-lg-6 mt-2">
                <div class="info info-horizontal info-hover-primary card shadow m-2">
                  <div class="description p-4">
                    {{-- <button type="button" class="close deletebtn" data-toggle="modal" data-target="#deletecategory" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
                    <form method="POST" action="{{ route('deletecat') }}"> 
                      <input type="hidden" name="id" value="{{ $cont->id }}">
                      <button type="submit" class="close" data-toggle="tooltip" data-placement="top" aria-label="Close" title="Delete Category"><span aria-hidden="true">&times;</span>
                      </button>
                      @csrf
                    </form>
                    <p class="text-center">{{ $cont->contestantcategories }}</p>
                  </div>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name of Nominees</th>
                        <th scope="col">No of Votes</th>
                        
                        {{-- <th scope="col">Actions</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($cont->contestants as $contestant)
                      <tr>
                        <td scope="row">{{ $counter ++ }}</td>
                        <td>{{ $contestant->name }}</td>
                        <td>{{ $contestant->votecount }}</td>
                        <td>
                          {{-- <a href="{{ route('contestant.edit', $contestant->id) }}" class="btn btn-sm btn-info">Edit</a>
                          <a href="#" class="btn btn-sm btn-danger float-right">Delete</a> --}}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>                
                </div>
              </div>
              @endforeach
            </div>
            <hr>
            <div class="row">
              {{-- <div class="col-lg-12"><h2 class="title display-3 text-center">Voting Result</h2></div> --}}
              <div class="col-lg-12 mt-2" id="reserve">
                <div class="info info-horizontal info-hover-primary card shadow m-2">
                  <div class="description p-4">
                    <p class="text-center">Details of Sits Reserved</p>
                  </div>
                  <table id="example" class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name </th>
                        <th scope="col">Sit No</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Phone No</th>
                        {{-- <th scope="col">Actions</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($bookedsits as $bookedsits)
                      <tr>
                        <td scope="row">{{ $bookedsits->id }}</td>
                        <td>{{ $bookedsits->name }}</td>
                        <td>{{ $bookedsits->sitno }}</td>
                        <td>{{ $bookedsits->email }}</td>
                        <td>{{ $bookedsits->phone }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>  
                                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     <style>
      .admin-img {
    max-width: 180px;
    border-radius: 0.25rem;
    transform: translate(-50%, -30%);
    position: absolute;
    left: 50%;
    transition: all 0.15s ease;
    }
    .count {
        text-align: center;
        margin-right: 1rem;
        padding: .875rem;
    }
    .heading {
        font-size: 1.1rem;
        font-weight: bold;
        display: block;
    }
    .description {
        font-size: .875rem;
        color: #adb5bd;
    }
    </style>
@endsection