/*
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
                resultElement.textContent = hotel.name;
                //on click
                resultElement.addEventListener('click', function () {
                    //add in search section
                    searchInput.value = hotel.name;
                    //clear on click
                    searchResultsContainer.innerHTML = '';
                });

                searchResultsContainer.appendChild(resultElement);
            });
        }
    });
    //<script>
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
                        <a href="#">Book Now</a>
                    `;

                    cardContainer.appendChild(card);
                });
                }
                });

    //</script>

function displaySearchResults(results) {
  //clear old
  searchResultsContainer.innerHTML = '';

  //add new
  results.forEach(hotel => {
      const resultElement = document.createElement('div');
      let displayInfo = '';

      // Decide what information to display*/

      
//       if (/* your condition to display hotel name */) {
//           displayInfo = hotel.name;
//       } else if (/* your condition to display city */) {
//           displayInfo = hotel.city;
//       } else if (/* your condition to display area */) {
//           displayInfo = hotel.area;
//       }

//       // Set the text content of the result element
//       resultElement.textContent = displayInfo;

//       //on click
//       resultElement.addEventListener('click', function () {
//           //add in search section
//           searchInput.value = displayInfo;
//           //clear on click
//           searchResultsContainer.innerHTML = '';
//       });

//       searchResultsContainer.appendChild(resultElement);
//   });
// }
