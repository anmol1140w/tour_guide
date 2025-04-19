document.getElementById('findLocations').addEventListener('click', function() {
    const rangeInput = document.getElementById('dist');
    let range = parseInt(rangeInput.value);

    if (!range || isNaN(range) || range <= 0) {
        alert('Please enter a valid range (greater than 0).');
        return;
    }

    if (range >= 0 && range <= 50) {
        range = 50;
    } else if (range > 50 && range <= 100) {
        range = 100;
    } else if (range > 150 && range <= 200) {
        range = 200;
    } else if (range >= 250 && range <= 300) {
        range = 300;
    } else {
        range = 300;
    }

    const city = document.getElementById('city').value;
    const genre = document.getElementById('genre').value;


    fetch(`php/fetch_data.php?city=${city}&genre=${genre}&dist=${range}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('locations').innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching locations:', error);
            document.getElementById('locations').innerHTML = 
                '<p class="text-danger">Error loading locations. Please try again.</p>';
        });
});