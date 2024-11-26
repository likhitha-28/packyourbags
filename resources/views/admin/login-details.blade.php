<x-layout>
    <div class="container" style="width: 20cm; padding:2cm">
    <form method="POST" action="{{ route('sendDetails', ['id' => $hotel->id]) }}">
        @csrf
        <input type="hidden" name="hotel_approved_id" value="{{ $hotel->id }}">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default" for="email">Email</span>
            <input type="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required value="{{ $hotel->email }}">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default" for="name">Hotel name</span>
            <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required value="{{ $hotel->name }}">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Email + Telephone</span>
            <input type="text" id="emailTelephone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $hotel->email . $hotel->telephone }}" readonly>
            <button type="button" onclick="copyText()" class="btn btn-secondary">Copy</button>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default" for="password">Password</span>
            <input type="password" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    function copyText() {
        var copyText = document.getElementById("emailTelephone");
        copyText.select();
        document.execCommand("copy");
        alert("Copied the text: " + copyText.value);
    }
</script>

</x-layout>