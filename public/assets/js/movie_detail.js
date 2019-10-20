var paramsString = window.location.search;
let params = new URLSearchParams(paramsString);
var xhr = new XMLHttpRequest();
var p = params.get("movie_id");
xhr.open('GET', 'api/movies/'.concat(p));
xhr.setRequestHeader('Content-Type', 'application/json');
xhr.onload = function() {
    if (xhr.status === 200) {
        var movieInfo = JSON.parse(xhr.responseText);
        document.getElementById("movie-image").src = movieInfo.image;
        document.getElementById("movie-name").innerHTML = movieInfo.movie_name;
        document.getElementById("movie-rating").innerHTML = movieInfo.rating;
        document.getElementById("movie-genre").innerHTML = movieInfo.genre;
        document.getElementById("movie-description").innerHTML = movieInfo.description;
        document.getElementById("movie-duration").innerHTML = movieInfo.duration;
        document.getElementById("movie-date").innerHTML = movieInfo.release_date;
    }
};
xhr.send();

xhr1 = new XMLHttpRequest();
xhr1.open('GET', 'api/schedule/'.concat(p));
xhr1.setRequestHeader('Content-Type', 'application/json');
xhr1.onload = function() {
    if (xhr1.status === 200) {
        var userInfo = JSON.parse(xhr1.responseText);
        var count = userInfo.count;
    
        document.getElementById('schedule').innerHTML = `
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Available seats</th>
        </tr>`;

        for (var i=0; i<count; i++) {
            if (userInfo.body[i].seats_count == '0') {
                status = 'Not Available';
            }
            else {
                status = 'Book Now';
            }
            document.getElementById('schedule').innerHTML = document.getElementById('schedule').innerHTML+
            `
                <tr>
                <td>`+userInfo.body[i].show_date+`</td>
                <td>`+userInfo.body[i].show_time+`</td>
                <td>
                    <span class="block--align-left block--black">`+userInfo.body[i].seats_count+`</span>
                    <span id="booking-link" onclick='location.href = "/booking?movie_showing_id=${userInfo.body[i].movie_showing_id}"' class="block--right block--skyblue">`+status+`</span>
                </td>
            </tr>
            `;
            if (status == 'Not Available') {
                document.getElementById('booking-link').style.color = 'red';
            }
        }
    }
};
xhr1.send();



xhr2 = new XMLHttpRequest();
xhr2.open('GET', 'api/review/'.concat(params.get("movie_id")));
xhr2.setRequestHeader('Content-Type', 'application/json');
// document.getElementById('reviews').innerHTML = '';
xhr2.onload = function() {
    if (xhr2.status === 200) {
        var userInfo = JSON.parse(xhr2.responseText);
        var count = userInfo.count;
        document.getElementById('reviews').innerHTML = '';
        for (var i=0; i<count; i++) {
            document.getElementById('reviews').innerHTML = `
            <tr>
                <td><img class="image--small block--circle" src="`+userInfo.body[i].image+`"></td>
                <td class="review">
                    <div class="text--bold">`+userInfo.body[i].username+`</div>
                    <div><span class="text--large text--bold">`+userInfo.body[i].rating+`</span> /10</div>
                    <div>`+userInfo.body[i].description+`</div>
                </td>
            </tr>
            `
        }
    }
};
xhr2.send();
