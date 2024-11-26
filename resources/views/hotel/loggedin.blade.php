<x-hotellayout>
  <div class="container">
    <div class="accordion" id="accordionPanelsStayOpenExample">
      
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Manage Hotel
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
        <strong>Hotel related</strong> 
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="addImages" class="list-group-item">Add Images</a></li>
        
          <li class="list-group-item"><a href="{{ route('view_hotel', ['hotel_approved_id' => $hotel->hotel_approved_id]) }}" class="list-group-item">Edit Hotel Information</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Manage Reservations
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
      <div class="accordion-body">
        <strong>Reservations related</strong> 
        <ul class="list-group list-group-flush">
        <li class="list-group-item"> <a href="view-reservations" class="list-group-item">view reservations</a></li>
        <li class="list-group-item"> <a href="confirmed-reservations" class="list-group-item">confirmed reservations</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
        tests
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
      <div class="accordion-body">
        <strong>tests</strong> 
        <ul class="list-group list-group-flush">
          <li class="list-group-item"> <a href="/send_mail" class="list-group-item">Test mail</a></li>
          <li class="list-group-item"> <a href="/movedata" class="list-group-item">Reservations</a></li>
          <li class="list-group-item"> <a href="#" class="list-group-item">Reservations</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  </div>

  <script>
    function openAccordionPanel() {
        $('#panelsStayOpen-collapseOne').collapse('toggle');
    }
</script>

</x-hotellayout>
