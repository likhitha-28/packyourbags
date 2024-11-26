<x-guest-layout>
    <div class="container3">
        <section>
            <h1 style= "padding: 1cm">Your Reviews</h1>
        
            @if ($userReviews->isEmpty())
                <p>No reviews found.</p>
            @else
                <div class="row">
                    @foreach ($userReviews as $review)
                        <div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><strong>Review #</strong>{{ $loop->iteration }}</h5>
                                    <p class="card-text"><strong>Comment: </strong>{{ $review->comment }}</p>
                                    <p class="card-text"><strong>Hotel Name: </strong>{{ $review->accommodation->availability->hotelApproved->name }}</p>
                                    <p class="card-text"><strong>Stay: </strong>{{ $review->accommodation->availability->start_date }} To {{ $review->accommodation->availability->end_date }}</p>
                                    <p class="card-text"><strong>Cleanliness: </strong>{{ $review->cleanliness }}</p>
                                    <p class="card-text"><strong>Accessibility: </strong>{{ $review->accessibility }}</p>
                                    <p class="card-text"><strong>location: </strong>{{ $review->location }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
    
</x-guest-layout>  





