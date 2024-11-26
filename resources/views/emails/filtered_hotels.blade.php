<x-explore>

<section>
    <div class="card-container">
        @foreach ($filteredHotels as $hotel)
        <a href="/booking-page/{{ $hotel->name }}" class="card-link">
        <h1><strong> for "{{$hotel ->name}}" </strong></h1>
            <div class="card">
                <img src="hotel{{ $hotel->id }}.jpg" alt="{{ $hotel->name }}">
                <h2>{{ $hotel->name }}</h2>
                <p>{{ $hotel->description }}</p>
                <a href="#" class="book_button">Book Now</a>
            </div>
        </a>
        @endforeach            
</section>

</x-explore>