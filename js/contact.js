$("document").ready(function () {
    var map = new YMaps.Map(document.getElementById("YMapsID"));
    map.setCenter(new YMaps.GeoPoint(92.910409, 56.046615), 14);

  var options = {
    draggable: false,
    hasBalloon: false,
      style: 'default#stadiumIcon',
    hintOptions: {
        maxWidth: 150,
        offset: new YMaps.Point(5, 5)
    },
    baloonOptions: {
        maxWidth: 150
    }

  };
    var placemark = new YMaps.Placemark(new YMaps.GeoPoint( 92.894359, 56.050434), options);
  placemark.name = "АРЕНА. СЕВЕР";
  placemark.description = "улица 9 Мая, 74";
  //placemark.hintOptions.maxWidth = 200;
  //placemark.width = 200;
  map.addOverlay(placemark);

  //placemark.openBalloon();
});
