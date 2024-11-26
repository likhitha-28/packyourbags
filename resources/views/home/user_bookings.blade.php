<x-guest-layout>   
    <div class="container3">
        <div class="row" style="display: flex; justify-content: space-between;">
            <div style="padding: 1cm;"> <!-- Left side -->
                <h1>Your Bookings</h1>
            </div>
            <div style="padding: 1cm;"> <!-- Right side -->
                <label for="filter">Filter:</label>
                <select id="filter">
                    <option value="all">All</option>
                    <option value="approved">Approved</option>
                    <option value="unapproved">Unapproved</option>
                </select>
            </div>
        </div>
        <section>
            <div class="row">
                @if ($allBookings->isEmpty())
                    <p>No Bookings found.</p>
                @else
                    <div id="bookings">
                        @foreach ($allBookings as $booking)
                            @if ($booking->availability)
                                <div class="booking @if ($booking instanceof \App\Models\ApprovedAccommodation) approved @else unapproved @endif">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>Booking #</strong>{{ $loop->iteration }}</h5>
                                            <p class="card-text"><strong>Hotel Name: </strong>{{ $booking->availability->hotelApproved->name }}</p>
                                            <p class="card-text"><strong>Stay: </strong>{{ $booking->availability->start_date }} To {{ $booking->availability->end_date }}</p>
                                            @if ($booking instanceof \App\Models\ApprovedAccommodation)
                            <span class="badge text-bg-primary">Approved</span>
                            @else
                            <span class="badge text-bg-warning">Unapproved</span>
                            @endif
                                        </div>
                                        @php
                                            $currentDate = \Carbon\Carbon::now();
                                            $endDate = \Carbon\Carbon::parse($booking->availability->end_date);
                                        @endphp
                                        @if($endDate->gt($currentDate))
                                            <form action="{{ url('/delete-booking/'.$booking->availability_id) }}" method="POST" class="btn btn-outline-danger" style="width: 100px;">
                                                @method('DELETE')
                                                {{ csrf_field() }}
                                                <button onclick="return confirm('Are you sure?'); saveandsubmit(event);">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </div>
</x-guest-layout>

<script>
    document.getElementById('filter').addEventListener('change', function() {
        const selectedFilter = this.value;
        const bookings = document.querySelectorAll('.booking');

        bookings.forEach(function(booking) {
            if (selectedFilter === 'all') {
                booking.style.display = 'block';
            } else if (selectedFilter === 'approved' && booking.classList.contains('approved')) {
                booking.style.display = 'block';
            } else if (selectedFilter === 'unapproved' && booking.classList.contains('unapproved')) {
                booking.style.display = 'block';
            } else {
                booking.style.display = 'none';
            }
        });
    });
</script>
