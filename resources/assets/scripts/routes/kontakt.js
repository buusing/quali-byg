export default {
  init() {
  	let map;
	  function initMap() {
	    map = new google.maps.Map(document.getElementById('map'), {
	      center: {lat: 55.108896440185504, lng: 14.994488635000039},
	      zoom: 8,
	    });
	  }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
