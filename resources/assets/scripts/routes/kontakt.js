export default {
  init() {
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('google-map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
      });
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
