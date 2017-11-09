function initMap() {
  var uluru = {lat: 55.758628, lng: 37.750194};
  var map = new google.maps.Map(document.getElementById('map'), {
     zoom: 16,
    center: uluru
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });
}