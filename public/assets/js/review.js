function submitReviewForm() {

    var starRating = document.querySelector('input[name="rating"]:checked').value;
    var description = document.getElementById("textArea").value;
    var userid = document.getElementById("userid").value;
    var movie_id = document.getElementById("movie_id").value;
    var transaction_id = document.getElementById("transaction_id").value;
    var request = new XMLHttpRequest();
    var url = "/api/reviews/add";
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/json");
    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {

            console.log(request.response);
        }
    };

    var data = JSON.stringify({
        "starRating": starRating,
        "description": description,
        "userid": userid,
        "movie_id": movie_id,
        "transaction_id": transaction_id
    });
    console.log(data);

    request.send(data);

    location.href = "/history";
};

function submitDeleteForm(button) {
    console.log(button);
    var transaction_id = button.getAttribute("value");
    console.log(transaction_id);
    var request = new XMLHttpRequest();
    var url = "/api/reviews/delete";
    request.open("DELETE", url + "/" + transaction_id, true);
    request.setRequestHeader("Content-Type", "application/json");
    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.response);
        }
    };

    var data = JSON.stringify({
        "transaction_id": transaction_id
    });
    console.log(data);

    request.send(data);
    location.href = "/history";

};

function submitEditForm(button) {
    var starRating = document.querySelector('input[name="rating"]:checked').value;
    var description = document.getElementById("textArea").value;
    var userid = document.getElementById("userid").value;
    var movie_id = document.getElementById("movie_id").value;
    var transaction_id = document.getElementById("transaction_id").value;
    var request = new XMLHttpRequest();
    var url = "/api/reviews/edit";
    request.open("POST", url, true);
    request.setRequestHeader("Content-Type", "application/json");
    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
            var jsonData = JSON.parse(request.response);
            console.log(jsonData);
        }
    };

    var data = JSON.stringify({
        "starRating": starRating,
        "description": description,
        "userid": userid,
        "movie_id": movie_id,
        "transaction_id": transaction_id
    });
    console.log(data);

    request.send(data);
    location.href = "/history";

};