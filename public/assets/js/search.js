var paramsString = window.location.search;
var params = new URLSearchParams(paramsString);
var xhr = new XMLHttpRequest();

xhr.open('GET', 'api/movies/search/'.concat(params.get("movie_name")));
xhr.setRequestHeader('Content-Type', 'application/json');
xhr.onload = function() {
  if (xhr.status === 200) {
    document.getElementById("search__counter").innerHTML += JSON.parse(xhr.response)["count"];
    document.getElementById("search__name").innerHTML += params.get("movie_name");

    for (let i = 0; i < JSON.parse(xhr.response)["count"]; i++) {
      let movie_id = JSON.parse(xhr.response)["body"][i]["movie_id"];
      let movie_name = JSON.parse(xhr.response)["body"][i]["movie_name"];
      let movie_image = JSON.parse(xhr.response)["body"][i]["image"];
      let movie_rating =  JSON.parse(xhr.response)["body"][i]["rating"];
      let movie_description =  JSON.parse(xhr.response)["body"][i]["description"];
      
      document.getElementById("search__playlist-wrapper").innerHTML += `
      <div class="search__playlist-item">
        <div class="search__playlist-item-main">
          <div class="search__playlist-item-img" style='background-image: url("${movie_image}");'></div>
          <div class="search__playlist-item-detail">
            <div class="search__playlist-item-title">
              ${movie_name}
            </div>
            <div class="search__playlist-item-rating">
              <img src="../public/assets/img/star.png" class="rating__star">
              ${movie_rating}
            </div>
            <p class="search__playlist-item-subtitle">
              ${movie_description}
            </p>
          </div>
        </div>
        <div
          class="search__playlist-item-button"
          onclick='location.href = "/movie?movie_id=${movie_id}"'
        >
          <span>View details</span>
          <img src="../public/assets/img/detail.png" class="search__playlist-item-icon">
        </div>
      </div>
      <hr>`
    }
  }
};
xhr.send();