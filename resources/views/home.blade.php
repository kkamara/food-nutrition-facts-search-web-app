@extends('layouts/main')

@section('content')
      <style>
        .empty-facts-container {
          color: #fff;
          font-weight: bold;
        }
      </style>
      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        @forelse($facts as $key => $fact)
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line"></i>
            <h3>
              <a 
                href="{{ route('foodNutritionFactPage', $fact->id) }}"
              >
                {{ $fact->food_nutrition_fact }}
              </a>
            </h3>
          </div>
        </div>
        @empty
          <h3 class='empty-facts-container'>There are no facts, search for one.</h3>
        @endforelse
      </div>
@endsection