@extends('layouts/main')

@section('content')
      <style>
        .find-a-fact {
          margin-top: 50px;
          color: #fff;
        }
        .query-submit-btn {
          width: 80px;
        }
        .empty-facts-container {
          color: #fff;
          font-weight: bold;
        }
      </style>
      @if(auth()->user())
      <form class="row find-a-fact" method='GET' action="{{ route('getFact') }}">
        @csrf
          <div class="col-md-4">
            <label for="query" class="col-form-label">Query:</label>
          </div>
          <div class="col-md-4">
            <input type="text" name='query' id="query" class="form-control" placeholder='Search your food nutrition facts...'>
          </div>
          <div class="col-md-4">
            <input class='form-control btn btn-success query-submit-btn' type='submit' value='Go' />
          </div>
      </form>
      @endif
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