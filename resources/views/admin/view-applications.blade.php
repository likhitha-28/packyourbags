<x-layout>


    <h1>Hotel Pending Applications</h1>
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

            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td><a href="/individual-page/{{ $hotel->id }}" class="card-link">{{ $hotel->name }}</a></td>
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
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const cardLinks = document.querySelectorAll('.card-link');
        cardLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const href = link.getAttribute('href');
                window.location.href = href;
            });
        });
    });
        </script>
</x-layout>