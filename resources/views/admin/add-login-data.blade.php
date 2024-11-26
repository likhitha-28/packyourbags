<x-layout>
    @foreach($hotels as $hotel)
    <form method="POST" action="/add-user">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="{{$hotel->email}}">

        <label for="name">Hotel Name:</label>
        <input type="text" id="name" name="name" required value="{{$hotel->name}}">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Submit</button>
    </form>
    @endforeach
</x-layout>