<x-layout>
  <div class="container">
    <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Hotel Operations
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> 
        <ul class="list-group list-group-flush">
          <li class="list-group-item"> <a href="/hotel-list-pending" class="list-group-item">Hotel Applications Pending</a></li>
          <li class="list-group-item"> <a href="/accepted-hotels" class="list-group-item">Hotel Database</a></li>
          {{-- <li class="list-group-item"> <a href="#" class="list-group-item">Import hotel information</a></li> --}}
          <li class="list-group-item"> <a href="accepted-hotels-edit" class="list-group-item">Edit Hotel Information</a></li>
          {{--<li class="list-group-item"> <a href="#" class="list-group-item">Reservations</a></li> --}}
          <li class="list-group-item"> <a href="add_hotel" class="list-group-item">Add Hotels</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
       Hotel Employee Operations
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
      <div class="accordion-body">
        <strong>??</strong>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Reservations
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
      <div class="accordion-body">
        <strong>View All Reservations</strong>
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
          
          <li class="list-group-item"> <a href="/accepte-hotel" class="list-group-item">Add user</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
  </div>
</x-layout>