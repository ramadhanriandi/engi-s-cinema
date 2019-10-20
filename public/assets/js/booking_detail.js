var paramsString = window.location.search;
let params = new URLSearchParams(paramsString);
var xhr = new XMLHttpRequest();
var p = params.get("movie_showing_id");
xhr.open('GET', 'api/seats/'.concat(p));
xhr.setRequestHeader('Content-Type', 'application/json');
xhr.onload = function() {
    if (xhr.status === 200) {
        var movieInfo = JSON.parse(xhr.responseText);
        var count = movieInfo.count;
        for (var i=0; i<count; i++) {
            document.getElementById("radio"+movieInfo.seat_number[i]).disabled = true;
            document.getElementById("radio"+movieInfo.seat_number[i]).parentNode.style.border = '1px solid #636363'
            document.getElementById("radio"+movieInfo.seat_number[i]).nextElementSibling.style.backgroundColor = '#ddd';
            document.getElementById("radio"+movieInfo.seat_number[i]).nextElementSibling.style.color = '#636363';
        }
    }
};
xhr.send();

var xhr1 = new XMLHttpRequest();
xhr1.open('GET', 'api/schedule/show/'.concat(p));
xhr1.setRequestHeader('Content-Type', 'application/json');
xhr1.onload = function() {
    if (xhr1.status === 200) {
        var movieInfo = JSON.parse(xhr1.responseText);
        document.getElementById("movie-name").innerHTML = movieInfo.movie_name;
        document.getElementById("movie-date").innerHTML = movieInfo.show_date;
        document.getElementById("movie-time").innerHTML = movieInfo.show_time;
        document.getElementById('movie-showing-id').innerHTML = movieInfo.movie_showing_id;
    }
};
xhr1.send();