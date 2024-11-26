<x-welcomelayout>
    <div class="main-content">
        <section>      
            <div class="card-container">
                @foreach($approvedHotels as $hotel)
                <?php 
                    $firstImage = optional($hotel->hotelImages->first())->image_url_1;
                    $reviews = collect(); // Initialize an empty collection to store all reviews

                    foreach ($hotel->availabilities as $availability) {
                        $accommodation = $availability->approvedaccommodation;
                        if ($accommodation) {
                            $reviews = $reviews->merge($accommodation->reviews);
                        }
                    }

                    $averageRatings = [
                        'cleanliness' => $reviews->avg('cleanliness'),
                        'accessibility' => $reviews->avg('accessibility'),
                        'staff' => $reviews->avg('staff'),
                        'location' => $reviews->avg('location'),
                        'value_for_money' => $reviews->avg('value_for_money')
                    ];

                    // Calculate overall average including all ratings
                    $overallAverage = $reviews->isEmpty() ? 0 : array_sum($averageRatings) / count($averageRatings);
                ?>

                <a href="/booking-page/{{ $hotel->name }}" class="card-link">
                    <div class="card">
                        <div class="card-content">
                            <div class="content-left">
                                
                                <h2>{{ $hotel->name }}</h2>
                                <p>{{ $hotel->description}}</p>
                                @if($overallAverage > 0)
                                <span class="badge text-bg-primary">Average Rating: {{ $overallAverage }}</span>
                                    
                                @else
                                    <p>No reviews yet</p>
                                @endif

                                <a href="/booking-page/{{ $hotel->name }}" class="book_button">Check availabilities</a>
                            </div>
                            <div class="content-right">
                                @if($firstImage)
                                    <img src="{{ $firstImage }}" alt="{{ $hotel->name }}" style="max-height: 4cm; max-width: 5cm; height: 4cm; width: 5cm;">
                                @else       
                                    <img src="{{ 'https://shorturl.at/dgpY1' }}" alt="Default Image">
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
    </div>
</x-welcomelayout>
