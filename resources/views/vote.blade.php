@extends('layout')

@section ('content')
<section class="section section-shaped section-lg" style="padding-top: 10rem; padding-bottom: 10rem;">
    <div class="shape shape-style-1 bg-gradient-default">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="container pt-lg-7">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-white pb-5">
              <div class="text-muted text-center mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon m-3">
                  <span class="btn-inner--icon"><img src="assets/img/icons/common/fb.png"></span>
                  <span class="btn-inner--text">Facebook</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon m-3">
                  <span class="btn-inner--icon"><img src="assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection