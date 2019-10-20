function submitBooking(){
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'api/booking',false);
    xhr.setRequestHeader('Content-Type', 'application/json');

    m_id = document.getElementById('movie-showing-id').innerHTML;
    f_date = document.getElementById("movie-date").innerHTML;
    f_time = document.getElementById("movie-time").innerHTML;
    s_num = document.getElementById('number').innerHTML;
    var data = JSON.stringify({
        "movie_showing_id": m_id, 
        "seat_number": s_num, 
        "for_date": f_date, 
        "for_time": f_time,
        "made_date": f_date
    });
  
    xhr.onload = function() {
        if (xhr.status === 201) {
            alert('Success');
            location.href = '/history';
        } else {
            alert("Failed");
            location.href = '/history';
        }
    };
    xhr.send(data);
}