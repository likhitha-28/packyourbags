<x-hotellayout>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Booked on</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            @if ($reservation->approvedaccommodation)
                <tr>
                    <td>{{ $reservation->approvedaccommodation->id }}</td>
                    <td>{{ $reservation->approvedaccommodation->user_name }}</td>
                    <td>{{ $reservation->approvedaccommodation->user_email }}</td>
                    <td>{{ $reservation->approvedaccommodation->created_at }}</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    </x-hotellayout>
    
    