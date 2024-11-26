<x-explore>
    <div class="main-content" >
        <section>      
            <div class="card-container">
               
            <h1>申し訳ありませんが、お探しのものが見つかりませんでした:(</h1>
            <h1>他のオプションもご覧ください :)</h1>
            @foreach($allHotels as $hotel)
            <a href="/booking-page/{{ $hotel->name }}" class="card-link">
                <div class="card">
                    <img src="hotel{{ $hotel->id }}.jpg" alt="{{ $hotel->name }}">
                    <h2>{{ $hotel->name }}</h2>
                    <p>{{ $hotel->description }}</p>
                    <a href="#">Check availability Now</a>
                </div>
            @endforeach         
            </div>
        </section>
    </div>
</x-explore>