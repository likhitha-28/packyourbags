<x-explore>
    <div class="main-content">
        <div class="container-wrapper">
            <div class="container1 mb-2">
                <div class="card1" style="width: 60rem;">
                    <section class="hotel-details ">
                        <div class="hotel-info">


                            <h3 class="card-title bigger-stylish-title">{{ $hotel->name }}</h3>
                            <p><strong>Address:</strong> {{ $hotel->address }}, {{ $hotel->city }}, {{ $hotel->area }}</p>
                            <p><strong>Distance:</strong> {{ $hotel->distance }}</p>
                            <p><strong>Property Type:</strong> {{ $hotel->property_type }}</p>
                            <p><strong>Telephone:</strong> {{ $hotel->telephone }}</p>
                            {{-- <p><strong>Number of Rooms:</strong> {{ $hotel->number_of_rooms }}</p> --}}
                            <p><strong>Place Type:</strong> {{ $hotel->place_type }}</p>
                            <p><strong>Star Rating:</strong> {{ $hotel->star }}</p>
                            <p><strong>Price:</strong> {{ $hotel->price }}yen</p>
                        </div>

                        <div class="container" style="position: relative;">
                            <div id="carouselExample" class="carousel slide">
                              <div class="carousel-inner">
                                @foreach($images as $image)
                                <div class="carousel-item active">
                                    <img src="{{ $image->image_url_1 }}" alt="Image 1">
                                </div>
                                @endforeach
                              </div>
                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="top: 0; right: 0;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                              </button>
                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="top: 0; left: auto;">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                              </button>
                            </div>
                          </div>
                    </section>
                    {{-- <div id='calendar'> --}}
                        <form action="/view-availability-cal" method="POST">
                            @csrf
                            <input type="hidden" name="hotel_approved_id" value="{{ $hotel->id }}">
                            <input type="hidden" name="start_date" value="{{ date('Y-m-d', strtotime('1-3-2024')) }}">
                            <input type="hidden" name="end_date" value="{{ date('Y-m-d', strtotime('30-4-2024')) }}">
                            <button type="submit"  class="btn btn-primary" style="margin: 1cm">view full availability calender</button>
                        </form>
                    <section class="availability-check">
                        <form class="search-form form-group" action="/check-availability" style="width: 50rem;">
                            @csrf
                            <input type="date" placeholder="From Date" name="start_date" value="{{ session('from') }}">
                            <input type="date" placeholder="To Date" name="end_date" value="{{ session('to') }}">
                            <input type="hidden" name="hotel_approved_id" value="{{ $hotel->id }}">
                            <button type="submit" class="btn btn-primary">Check Availabily</button>
                            <div id="searchResultsContainer"></div>
                        </form>
                        
                        <form class="search-form form-group" action="/book-now" style="width: 50rem;" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="{{ $hotel->name }}">
                            <input type="date" placeholder="From Date" name="start_date" value="{{ session('from') }}">
                            <input type="date" placeholder="To Date" name="end_date" value="{{ session('to') }}">
                            <input type="hidden" name="hotel_approved_id" value="{{ $hotel->id }}">
                            <button type="submit" class="btn btn-primary">Book now</button>
                        </form>
                         
                    </section>
            
                    <section class="booking-options">
                        <button>check availability now</button>
                       <input type="hidden" name="hotel_approved_id" value="{{ $hotel->id }}">
                        <button>umm</button>
                    </section>
                    <div>
                        
                    
                    @if ($accommodation && !$accommodation->reviewedByUser(Auth::user()->email)) {{-- check if user already has a review if yes, dont show form--}}
                    <section class="reviews">
                       Add review:
                        
                       <strong>{{ Auth::user()->name }}</strong> please leave your review
                       <form action="/submit-review" method="POST" class="review-form">
                           @csrf
                           <input type="hidden" name="approved_accommodation_id" value="{{ $accommodation->id }}">
                           <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                           <input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
                       
                           <div class="form-group">
                               <label for="comment">Comment:</label>
                               <textarea id="comment" name="comment" rows="4" cols="50" class="form-control" required></textarea>
                           </div>
                       
                           <div class="form-group">
                               <label for="cleanliness">Cleanliness (0-10):</label>
                               <input type="number" id="cleanliness" name="cleanliness" min="0" max="10" class="form-control" required>
                           </div>
                       
                           <div class="form-group">
                               <label for="accessibility">Accessibility (0-10):</label>
                               <input type="number" id="accessibility" name="accessibility" min="0" max="10" class="form-control" required>
                           </div>
                       
                           <div class="form-group">
                               <label for="staff">Staff (0-10):</label>
                               <input type="number" id="staff" name="staff" min="0" max="10" class="form-control" required>
                           </div>
                       
                           <div class="form-group">
                               <label for="location">Location (0-10):</label>
                               <input type="number" id="location" name="location" min="0" max="10" class="form-control" required>
                           </div>
                       
                           <div class="form-group">
                               <label for="value_for_money">Value for Money (0-10):</label>
                               <input type="number" id="value_for_money" name="value_for_money" min="0" max="10" class="form-control" required>
                           </div>
                       
                           <button type="submit" class="btn btn-primary">Submit Review</button>
                       </form>
                       
                    </section>
                    @endif
                    <div class="container">
                    </div>
                    <div style="width: 8cm; background-color: #f0f0f0; padding: 10px;">
                    <label for="customRange2" class="form-label">Cleanliness</label>
                    <input type="range" class="form-range" min="0" max="10" id="customRange2" value="{{ $averageRatings['cleanliness'] }}" disabled>
                    
                    <label for="customRange3" class="form-label">Accessibility</label>
                    <input type="range" class="form-range" min="0" max="10" id="customRange3" value="{{ $averageRatings['accessibility'] }}" disabled>
                    
                    <label for="customRange4" class="form-label">Staff</label>
                    <input type="range" class="form-range" min="0" max="10" id="customRange4" value="{{ $averageRatings['staff'] }}" disabled>
                    
                    <label for="customRange5" class="form-label">Location</label>
                    <input type="range" class="form-range" min="0" max="10" id="customRange5" value="{{ $averageRatings['location'] }}" disabled>
                    
                    <label for="customRange6" class="form-label">Value for Money</label>
                    <input type="range" class="form-range" min="0" max="10" id="customRange6" value="{{ $averageRatings['value_for_money'] }}" disabled>
                    </div>
                </div>
                    <section>
                        All reviews:
                        @foreach ($reviews as $review)
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                              <h5 class="card-title">By {{ $review->user_name }}</h5>
                              <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                              <p class="card-text">{{ $review->comment }}</p>
                              <p class="card-text">cleanliness: {{ $review->cleanliness }}</p>
                              <p class="card-text">accessibility: {{ $review->accessibility }}</p>
                            </div>
                          </div>
                        @endforeach

                    </section>
                </div>
            </div>
        </div>
    </div>
</x-explore>


