var xhr = new XMLHttpRequest();
xhr.open('GET', '/api/movies');
xhr.onload = function() {
  if (xhr.status === 200) {
    for (let i = 0; i < JSON.parse(xhr.response)["count"]; i++) {
      let movie_id = JSON.parse(xhr.response)["body"][i]["movie_id"];
      let movie_name = JSON.parse(xhr.response)["body"][i]["movie_name"];
      let movie_image = JSON.parse(xhr.response)["body"][i]["image"];
      let movie_rating =  JSON.parse(xhr.response)["body"][i]["rating"];
      document.getElementById("home__playlist-wrapper").innerHTML += `
      <div 
        class='home__playlist-item'
        onclick='location.href = "/movie?movie_id=${movie_id}"'
      >
        <div
          class='home__playlist-item-img'
          style='background-image: url("${movie_image}")';
        ></div>
        <div class='home__playlist-item-title'>
          ${movie_name}
        </div>
        <div class='home__playlist-item-rating'>
          <img src='../public/assets/img/star.png' class='rating__star'>
          ${movie_rating}
        </div>
      </div>`
    }
  }
};
xhr.send();

document.getElementById("navbar__search-bar")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        var movie_name = document.getElementById("navbar__search-bar").value;
        location.href = `/search?movie_name=${movie_name}`;
    }
});