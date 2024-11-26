
<script src="{{ asset('js/filter.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchForm = document.getElementById('liveSearchForm');
        const searchInput = document.getElementById('search');
        const searchResultsContainer = document.getElementById('searchResultsContainer');
        const filterButton = document.querySelector('.btn-outline-info');

        searchForm.addEventListener('input', function () {
            const query = searchInput.value.trim();

            if (query.length >= 2) {
                fetch(`/live-search?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        //display search results
                        displaySearchResults(data);
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                //if less than 2
                searchResultsContainer.innerHTML = '';
            }
        });

        function displaySearchResults(results) {
            //clear old
            searchResultsContainer.innerHTML = '';
            //add new
            results.forEach(hotel => {
                const resultElement = document.createElement('div');
                resultElement.textContent = `${hotel.name}, ${hotel.city}, ${hotel.area}`
                //on click
                resultElement.addEventListener('click', function () {
                    //add in search section
                    searchInput.value = `${hotel.name}`
                    //clear on click
                    searchResultsContainer.innerHTML = '';
                });

                searchResultsContainer.appendChild(resultElement);
            });
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
  const searchForm = document.getElementById('liveSearchForm');
        const searchInput = document.getElementById('search');
        const searchResultsContainer = document.getElementById('searchResultsContainer');
        const filterButton = document.querySelector('.btn-outline-info');

        //query from URL
        const urlParams = new URLSearchParams(window.location.search);
        const query = urlParams.get('query');

        //search input value to the extracted query
        searchInput.value = query;

        //event listener for input on search form
        searchForm.addEventListener('input', function () {
          
  document.addEventListener('DOMContentLoaded', function () {
  const filterButton = document.querySelector('#filterButton');
  const cardContainer = document.querySelector('.card-container');

  filterButton.addEventListener('click', function () {
      const checkboxes = document.querySelectorAll('.filter-checkbox');
      const filters = {};

      checkboxes.forEach((checkbox) => {
          if (checkbox.checked) {
              filters[checkbox.name] = checkbox.value;
          }
      });

      fetch('/filter-hotels', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          },
          body: JSON.stringify(filters),
      })
      .then(response => response.json())
      .then(data => {
          //update with filtered
          updateCardContainer(data);
      })
      .catch(error => console.error('Error:', error));
  });

  function updateCardContainer(filteredHotels) {
      console.log(filteredHotels);
      cardContainer.innerHTML = '';

      //append the filtered hotels to the card container
      filteredHotels.forEach(hotel => {
          const card = document.createElement('div');
          card.classList.add('card');

          //edit
          card.innerHTML = `
              <img src="hotel${hotel.id}.jpg" alt="${hotel.name}">
              <h2>${hotel.name}</h2>
              <p>${hotel.description}</p>
              <a href="#">check availability now Now</a>
          `;

          cardContainer.appendChild(card);
      });
      }
      });
    })
</script>
<!-- FullCalendar JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>
