function radioClick(radio){
    var x = document.getElementById(radio.id).nextElementSibling.innerHTML;

    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", '../../../templates/booking_summary.html', false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4) {
            if(rawFile.status === 200 || rawFile.status == 0) {
                var allText = rawFile.responseText;
                document.getElementById('booking-summary').innerHTML = allText;
                document.getElementById('number').innerHTML = x;
                document.getElementById('bmovie-name').innerHTML = document.getElementById('movie-name').innerHTML;
                document.getElementById('bmovie-date').innerHTML = document.getElementById('movie-date').innerHTML;
                document.getElementById('bmovie-time').innerHTML = document.getElementById('movie-time').innerHTML;
            }
        }
    }
    rawFile.send(null);
}