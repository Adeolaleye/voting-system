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
                    <span class="heading">{{ $checkedin }}</span>
                    <span class="description">Checked</span>
                  </div>
                  <div class="count">
                    <span class="heading">{{ $unchecked }}</span>
                    <span class="description">Unchecked</span>
                  </div>
                  <div class="count">
                    <span class="heading">{{ $bookedsits_count }}</span>
                    <span class="description">Attendees</span>
                  </div>
                  <div class="count">
                    <span class="heading">{{ $highest }}</span>
                    <span class="description">No of tables</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-lg-12" id="reserve">
                <div class="info info-horizontal info-hover-primary m-2">
                  <div class="description p-4 text-center">
                    <h4 class="mt-2">Details of Sits Reserved</h4>
                    <a href="result" class="font-weight-light">Back Home</a>
                  </div>
                  <table id="example" class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name </th>
                        <th scope="col">Table No</th>
                        <th scope="col">Attendee No</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($bookedsits as $bookedsits)
                      <tr>
                        <td scope="row">{{ $bookedsits->id }}</td>
                        <td>{{ $bookedsits->name }}</td>
                        <td>{{ $bookedsits->table_no }}</td>
                        <td>{{ $bookedsits->sitno }}</td>
                        <td>{{ $bookedsits->email }}</td>
                        <td>{{ $bookedsits->phone }}</td>
                        <td>
                          @if ($bookedsits->status == 0)
                          <form method="post" action="{{ route('checkin', $bookedsits->id) }}">
                            @csrf
                            <button class="btn btn-neutral btn-icon">
                              <span class="btn-inner--text"><i class="fa fa-check"></i></span>
                            </button>
                          </form>
                          @endif
                          @if ($bookedsits->status == 1)
                          <form method="post" action="">
                            @csrf
                            <button class="btn btn-neutral btn-icon">
                              <span class="btn-inner--text">Checked In</span>
                            </button>
                          </form>
                          @endif
                        </td>
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