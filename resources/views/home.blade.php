@extends('layout')

@section ('content')
<div class="section-xl section-hero section-shaped">
    <div class="shape shape-style-3 shape-default">
        <span class="span-150"></span>
    </div>
    <div class="page-header">
        <div class="container shape-container d-flex align-items-center py-lg">
            <div class="col px-0">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 text-center">
                        <p class="sub-title text-uppercase">SGTV recognition and honour</p>
                        <h1 class="text-white display-1">Stardom Global Awards 2021</h1> 
                        {{-- Your name={{ isset(auth()->user()->name) ?  auth()->user()->name : ''}} --}}
                        <h2 class="display-4 font-weight-normal text-white">The opportunity to vote your preferred nominees is here</h2>
                        <div class="mt-6">
                            <ul id="countdown">
                                <li id="days">
                                  <div class="number">00</div>
                                  <div class="label">Days</div>
                                </li>
                                <li id="hours">
                                  <div class="number">00</div>
                                  <div class="label">Hours</div>
                                </li>
                                <li id="minutes">
                                  <div class="number">00</div>
                                  <div class="label">Minutes</div>
                                </li>
                                <li id="seconds">
                                  <div class="number">00</div>
                                  <div class="label">Seconds</div>
                                </li>
                            </ul> 
                        </div>
                        <div class="btn-wrapper mt-2">
                            <a href="#vote" class="btn btn-primary btn-icon mt-3 mb-sm-0">
                                <span class="btn-inner--text">Vote Now</span>
                            </a>
                            <a href="{{route ('ticket') }}" class="btn btn-neutral btn-icon mt-3 mb-sm-0">
                                <span class="btn-inner--text">Book A Sit</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
<div class="section features-6" id="vote">
    <div class="container">
        <div class="py-3 mb-3 border-bottom text-center">
            <div class="row justify-content-center">
              <div class="col-lg-9">
                <p>In view of the pivotal role of the Media in National development and in realization of her core objectives, the stardom Global Award Series, an Sgtv Hall of Fame recognition hope to identify excellence, innovation, competition achievement of Nigerians in all walls of Life and celebrate some in a yearly grand style award and induction of outstanding achievers into the Sgtv Hall of Fame. This is to promote culture of excellence performance and patriotism in public service.</p>
                <a href="https://sgtv.tv/" target="_black">Learn more</a>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title display-3 text-center">Categories</h2>
            </div>
            @if ($counter > 0)
                @foreach ($contestantCat as $contestant)
                <div class="col-lg-6">
                    <div class="info info-horizontal info-hover-primary card shadow m-4">
                        <div class="description p-4">
                            <p class="text-center">{{$contestant->contestantcategories}}</p>
                            <a href="{{ route('contestant.show', $contestant->id) }}"
                                class="btn btn-primary mb-4 mt-4 center">Click to vote</a>
                        </div>
                    </div>
                </div>
                @endforeach 
            @endif
            @if ($counter == 0)
                <p>No Contestant Available</p>
            @endif
        </div>
    </div>
</div>
<br /><br />
<style>
    ul#countdown {
  position: relative;
  transform: translateY(-50%);
  width: 50%;
  margin: 0 auto;
  padding: 5px 0 5px 0;
  border: 1px solid #adafb2;
  border-width: 1px 0;
  color: #fff;
  overflow: hidden;
  font-family: 'Arial Narrow', Arial, sans-serif;
  font-weight: bold;
  }
  @media (max-width: 600px) {
    ul#countdown {
    width: 100%;
  }
}
  #countdown li {
    margin: 0 -3px 0 0;
    padding: 0;
    display: inline-block;
    width: 25%;
    font-size: 25px;
    text-align: center;
    }
    #countdown .label {
      color: #adafb2;
      font-size: 16px;
      text-transform: uppercase;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script>
    /* --------------------------
 * GLOBAL VARS
 * -------------------------- */
// The date you want to count down to
var targetDate = new Date("2021/11/30 11:59:00");   

// Other date related variables
var days;
var hrs;
var min;
var sec;

/* --------------------------
 * ON DOCUMENT LOAD
 * -------------------------- */
$(function() {
   // Calculate time until launch date
   timeToLaunch();
  // Transition the current countdown from 0 
  numberTransition('#days .number', days, 1000, 'easeOutQuad');
  numberTransition('#hours .number', hrs, 1000, 'easeOutQuad');
  numberTransition('#minutes .number', min, 1000, 'easeOutQuad');
  numberTransition('#seconds .number', sec, 1000, 'easeOutQuad');
  // Begin Countdown
  setTimeout(countDownTimer,1001);
});

/* --------------------------
 * FIGURE OUT THE AMOUNT OF 
   TIME LEFT BEFORE LAUNCH
 * -------------------------- */
function timeToLaunch(){
    // Get the current date
    var currentDate = new Date();

    // Find the difference between dates
    var diff = (currentDate - targetDate)/1000;
    var diff = Math.abs(Math.floor(diff));  

    // Check number of days until target
    days = Math.floor(diff/(24*60*60));
    sec = diff - days * 24*60*60;

    // Check number of hours until target
    hrs = Math.floor(sec/(60*60));
    sec = sec - hrs * 60*60;

    // Check number of minutes until target
    min = Math.floor(sec/(60));
    sec = sec - min * 60;
}

/* --------------------------
 * DISPLAY THE CURRENT 
   COUNT TO LAUNCH
 * -------------------------- */
function countDownTimer(){ 
    
    // Figure out the time to launch
    timeToLaunch();
    
    // Write to countdown component
    $( "#days .number" ).text(days);
    $( "#hours .number" ).text(hrs);
    $( "#minutes .number" ).text(min);
    $( "#seconds .number" ).text(sec);
    
    // Repeat the check every second
    setTimeout(countDownTimer,1000);
}

/* --------------------------
 * TRANSITION NUMBERS FROM 0
   TO CURRENT TIME UNTIL LAUNCH
 * -------------------------- */
function numberTransition(id, endPoint, transitionDuration, transitionEase){
  // Transition numbers from 0 to the final number
  $({numberCount: $(id).text()}).animate({numberCount: endPoint}, {
      duration: transitionDuration,
      easing:transitionEase,
      step: function() {
        $(id).text(Math.floor(this.numberCount));
      },
      complete: function() {
        $(id).text(this.numberCount);
      }
   }); 
};
</script>
@endsection