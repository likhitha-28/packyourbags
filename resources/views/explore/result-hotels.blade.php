<x-explore>
    <div class="main">
    <section>
        <div class="card-container">
            <h1>for "@if($query){{$query}}@else??@endif"</h1>
            @foreach($hotels as $hotel)
            <a href="/booking-page/{{ $hotel->name }}" class="card-link">
                <div class="card">
                    <img src="hotel{{ $hotel->id }}.jpg" alt="{{ $hotel->name }}">
                    <h2>{{ $hotel->name }}</h2>
                    <p>{{ $hotel->description }}</p>
                    <a href="#" class="book_button">Check availability</a>
                </div>
            </a>
            @endforeach            
  </section>
    </div>
</x-explore>




