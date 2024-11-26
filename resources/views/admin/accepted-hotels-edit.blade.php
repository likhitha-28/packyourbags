<x-layout>
    <h1>Hotels</h1>
    <div class="table-responsive">
    <table border="1" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Adress</th>
                <th>City</th>
                <th>Area</th>
                <th>Distance From Center</th>
                <th>property_type</th>
                <th>Telephone</th>
                <th>Number of Rooms</th>
                <th>Place Type</th>
                <th>Resaurant</th>
                <th>Breakfast</th>
                <th>Pool</th>
                <th>Star</th>
                <th>Bed Types</th>
                <th>Chain</th>
                <th>Cancle</th>
                <th>Price</th>
                <th>Edit/Delete Hotel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->email }}</td>
                    <td>{{ $hotel->adress }}</td>
                    <td>{{ $hotel->city }}</td>
                    <td>{{ $hotel->area }}</td>
                    <td>{{ $hotel->distance }}</td>
                    <td>{{ $hotel->property_type }}</td>
                    <td>{{ $hotel->telephone }}</td>
                    <td>{{ $hotel->number_of_rooms }}</td>
                    <td>{{ $hotel->place_type }}</td>
                    <td>{{ $hotel->resto ? 'Yes' : 'No' }}</td>
                    <td>{{ $hotel->breakfast ? 'Yes' : 'No' }}</td>
                    <td>{{ $hotel->pool ? 'Yes' : 'No' }}</td>
                    <td>{{ $hotel->star }}</td>
                    <td>{{ $hotel->bed_types }}</td>
                    <td>{{ $hotel->chain ? 'Yes' : 'No' }}</td>
                    <td>{{ $hotel->cancle ? 'Yes' : 'No' }}</td>
                    <td>{{ $hotel->price }}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <form action="{{ url('/edit-hotel/'.$hotel->id) }}" method="GET" class="btn-outline-primary">
                                <button class="btn btn-primary">Edit</button>
                              </form>
                              <form action="{{ url('/delete-hotel/'.$hotel->id) }}" method="POST">
                                @method('DELETE')
                                {{ csrf_field() }}
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?'); saveandsubmit(event);">Delete</button>
                              </form>
                          </div>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>