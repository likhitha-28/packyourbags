<x-hotellayout>
<table border="1" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Booked on</th>
            <th>confirm</th>
            <th>delete</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($reservations as $reservation)
        @if ($reservation->accommodation)
            <tr>
                <td>{{ $reservation->accommodation->id }}</td>
                <td>{{ $reservation->accommodation->user_name }}</td>
                <td>{{ $reservation->accommodation->user_email }}</td>
                <td>{{ $reservation->accommodation->created_at }}</td>
                <td style="color: green">
                    <form action="{{ route('acceptBooking', ['id' => $reservation->accommodation->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Accept</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('rejectBooking', ['id' => $reservation->accommodation->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?'); saveandsubmit(event);">Reject</button>
                    </form>
                </td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
</x-hotellayout>

