@extends('layout')

@section ('content')
    <section class="section-profile-cover section-shaped my-0">
      <!-- Circles background -->
      <img class="bg-image" src="{{ asset ('assets/img/dashboard.jpg') }}" style="width: 100%;">
    </section>
    <section class="section bg-secondary">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4 opacity-bg" id="photo">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-center mt-5">
                <h2><strong>Reservation Details</strong></h2>
                <div class="h6 font-weight-300">kindly come along with the screenshot of this ticket to secure your sit</div>
              </div>
            </div>
            <hr>
            <div class="row justify-content-center">
              <div class="col-lg-4 mt-2 mb-6 ">
                <div class="">
                  <span class="h5">Name :</span> <span class="h5 font-weight-300">{{ $bookasit->name }}</span><br>
                  <span class="h5">Email :</span> <span class="h5 font-weight-300">{{ $bookasit->email }}</span><br>
                  <span class="h5">Phone No :</span> <span class="h5 font-weight-300">{{ $bookasit->phone }}</span><br>
                  <span class="h5">Sit No:</span> <span class="h5 font-weight-300">{{ $bookasit->sitno }}</span><br>
                  {{-- <div class="text-center">
                    <button type="submit" class="text-center btn btn-primary my-4 " onclick="takeshot()">Print</button> 
                  </div> --}}
              </div> 
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
        .opacity-bg{
          background-image: url('{{ asset('assets/img/opacity-logo.png') }}'); 
          background-repeat:no-repeat; 
          background-position:center;
        }
        @media (min-width: 1200px){
        .container {
            max-width: 1077px;
        }
        }
        @media (max-width: 395px){
        .h5{
          font-size: 0.9rem;
        }
        h2, .h2 {
          font-size: 1.5rem;
        }
        }
    </style>
@endsection