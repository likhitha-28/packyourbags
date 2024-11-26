<x-layout>
    <div class="container">
        @if ($hotel)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $hotel->name }}</h5>
                <p class="card-text">
                    <strong>ID:</strong> {{ $hotel->id }}<hr>
                    <strong>Email:</strong> {{ $hotel->email }}<hr>
                    <strong>Address:</strong> {{ $hotel->adress }}<hr>
                    <strong>City:</strong> {{ $hotel->city }}<hr>
                    <strong>Area:</strong> {{ $hotel->area }}<hr>
                    <strong>Distance From Center:</strong> {{ $hotel->distance }}<hr>
                    <strong>Property Type:</strong> {{ $hotel->property_type }}<hr>
                    <strong>Telephone:</strong> {{ $hotel->telephone }}<hr>
                    <strong>Number of Rooms:</strong> {{ $hotel->number_of_rooms }}<hr>
                    <strong>Place Type:</strong> {{ $hotel->place_type }}<hr>
                    <strong>Restaurant:</strong> {{ $hotel->resto ? 'Yes' : 'No' }}<hr>
                    <strong>Breakfast:</strong> {{ $hotel->breakfast ? 'Yes' : 'No' }}<hr>
                    <strong>Pool:</strong> {{ $hotel->pool ? 'Yes' : 'No' }}<hr>
                    <strong>Star:</strong> {{ $hotel->star }}<hr>
                    <strong>Bed Types:</strong> {{ $hotel->bed_types }}<hr>
                    <strong>Chain:</strong> {{ $hotel->chain ? 'Yes' : 'No' }}<hr>
                    <strong>Cancel:</strong> {{ $hotel->cancle ? 'Yes' : 'No' }}<hr>
                    <strong>Price:</strong> {{ $hotel->price }}<hr>
                </p>
                <div class="d-flex justify-content-between mt-3">
                    <form action="{{ route('acceptHotel', ['id' => $hotel->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Accept</button>
                    </form>
                    
                    <form action="{{ route('rejectHotel', ['id' => $hotel->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?'); saveandsubmit(event);">Reject</button>
                    </form>
                    
                </div>
            </div>
        </div>
        @else
            <p>Hotel not found</p>
        @endif
    </div>
</x-layout>

