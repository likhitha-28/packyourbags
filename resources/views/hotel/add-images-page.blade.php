<x-hotellayout>

  <div class="container">
  <h2>Add Hotel Image</h2>
  <form action="/storeImages" method="POST">
      @csrf

        <input type="hidden" id="hotel_approved_id" name="hotel_approved_id" value="{{ $hotelApprovedId }}" required>
          <div class="form-group">
          <label for="image_url_1">Image URL 1:</label>
          <input type="url" id="image_url_1" name="image_url_1" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  </x-hotellayout>
  