@extends('layout')

@section ('content')
    <section class="section-profile-cover section-shaped my-0" style="height: 275px">
      <!-- Circles background -->
      <img class="bg-image" src="{{ asset ('assets/img/dashboard.jpg') }}" style="width: 100%;">
    </section>
    <section class="section bg-secondary">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card bg-secondary shadow border-0 mb-0 mt--220">
              <div class="card-header bg-white pb-5">
                <div class="text-muted text-center mb-1 mt-1">
                  <h2>Add Nominees</h2>
                  <small>Fill Field Appropiately</small>
                </div>
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                <form role="form" method="POST" action="{{ route('addnorm') }}">
                    <div class="form-group mb-3">
                        <p class="text-center">{{ $errors->first('contestantcategories', 'Category is required') }}</p>
                        @if(session()->get('message'))
                            <p class="text-center"> {{ session()->get('message')}} </p>
                        @endif
                      <select class="form-control mb-3" name="category_id">
                          <option></option>
                        @foreach ($contestantcat as $categories)
                        <option value="{{ $categories->id}}">{{ $categories->contestantcategories}}</option>
                        @endforeach
                      </select>
                      <input class="form-control" placeholder="Fullname" type="text" name="name">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary my-4">Submit</button>
                    <p><a href="result">Back To Result</a></p>
                    </div>
                    @csrf
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection