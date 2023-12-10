function initMap() {
        var uluru = {lat: -6.140425, lng: 106.825492};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru,
          scrollwheel: false,
          streetViewControl: false,
          mapTypeControl: false
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }