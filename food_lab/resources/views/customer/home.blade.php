@extends('COMMON.layout.layout_customer')

@section('body')

{{--  Start Marquee  --}}
    <marquee class="py-2">
      <p class="d-inline mx-5">Every Weekend will give you 5%.</p>
      <p class="d-inline mx-5">Coming new food soon!</p>
    </marquee>
    {{--  End Marquee  --}}

    <header class="bg-primary">

        {{--  start navbar  --}}
      <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <a href="#" class="navbar-brand d-lg-none">
            <img src="logo.png" width="70px" class=""></img>
            <span>{{  __('messageMK.food lab') }}</span>
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse text-uppercase fw-bolder" id="navbarNav">
              <ul class="navbar-nav w-100 justify-content-around">
                  <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('messageMK.home') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">{{  __('messageMK.products') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('messageMK.buy coin') }}</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="navbar-brand d-lg-inline d-md-none">
                      <img src="logo.png" width="70px" class=""></img>
                      <span>{{  __('messageMK.food lab') }}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('messageMK.inform') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('messageMK.access') }}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">profile</a>
                  </li>
              </ul>
            </div>

      </nav>
        {{--  end navbar  --}}

        {{--  start carousel  --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        {{--  end carousel  --}}
    </header>

@endsection