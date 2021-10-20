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
              <div class="col-lg-12 text-center mt-5">
                <h2><strong>Sit Reservation</strong></h2>
                <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>Kindly fill the form below to reserve a sit for SGTV Award Night</div>
              </div>
            </div>
            <hr>
            <div class="row justify-content-center">
              <div class="col-lg-8 mt-2 ">
                <form role="form" method="POST" action="{{ route('ticket') }}">
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            {{ $errors ->first('name') }}
                            <input class="form-control" placeholder="Fullname" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                          {{ $errors ->first('email') }}
                            <input class="form-control" placeholder="Email" type="email" name="email">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                          {{ $errors ->first('phone') }}
                            <input class="form-control" placeholder="Phone No" type="text" name="phone">
                        </div>
                    </div>
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
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">Book Now</button>
                    </div>
                    @csrf
                </form> 
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <style>
        .input-group-alternative {
            box-shadow: none; 
            border: 1px solid #eee;
            transition: box-shadow .15s ease;
        }
        @media (min-width: 1200px){
        .container {
            max-width: 1077px;
        }
        }
    </style>
@endsection