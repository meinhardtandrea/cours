      google.load('visualization', '1');

      function initialize() {

        var tableid = '1twnakZRZppPglxk52OP-ItKW_gLzx1fD0lNUfAo6';
        var geocoder = new google.maps.Geocoder();
        var infoWindow = new google.maps.InfoWindow();
  var MY_MAPTYPE_ID = 'custom_style';
  var featureOpts = [
    {
      stylers: [
        { hue: '#344253' },
        { visibility: 'simplified' },
        { gamma: 0.5 },
        { weight: 0.5 }
      ]
    },
    {
      elementType: 'labels',
      stylers: [
        { visibility: 'on' }
      ]
    },
    {
      featureType: 'water',
      stylers: [
        { color: '#344253' }
      ]
    }
  ];

  var mapOptions = {
    zoom: 10,
    minZoom: 5,
    center: new google.maps.LatLng(43.6109200,3.8772300),
    mapTypeControl: false,
    mapTypeControlOptions: false,
    mapTypeId: MY_MAPTYPE_ID,
    zoomControl: true,
    streetViewControl: false,
  };

    google.maps.visualRefresh = true;
    var isMobile = (navigator.userAgent.toLowerCase().indexOf('android') > -1) ||
      (navigator.userAgent.match(/(iPod|iPhone|iPad|BlackBerry|Windows Phone|iemobile)/));
    if (isMobile) {
      var viewport = document.querySelector("meta[name=viewport]");
      viewport.setAttribute('content', 'initial-scale=1.0, user-scalable=no');
    }

    var map = new google.maps.Map(document.getElementById('googft-mapCanvas'),mapOptions);

    var mapDiv = document.getElementById('googft-mapCanvas');
    mapDiv.style.width = isMobile ? '100%' : '1000px';
    mapDiv.style.height = isMobile ? '100%' : '400px';
    map = new google.maps.Map(mapDiv,mapOptions);

    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend-open'));
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend'));

    var layer = new google.maps.FusionTablesLayer({
      map: map,
      heatmap: { enabled: false },
      query: {
        select: "col20\x3e\x3e0",
        from: tableid,
        where: ""
      },
      options: {
        styleId: 2,
        templateId: 2
      }
    });

  var styledMapOptions = {
    name: 'Custom Style'
  };

  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
    if (isMobile) {
      var legend = document.getElementById('googft-legend');
      var legendOpenButton = document.getElementById('googft-legend-open');
      var legendCloseButton = document.getElementById('googft-legend-close');
      legend.style.display = 'none';
      legendOpenButton.style.display = 'block';
      legendCloseButton.style.display = 'block';
      legendOpenButton.onclick = function() {
        legend.style.display = 'block';
        legendOpenButton.style.display = 'none';
      }
      legendCloseButton.onclick = function() {
        legend.style.display = 'none';
        legendOpenButton.style.display = 'block';
      }
    }
//insérer ici le code geocoder
	   geocodeAddress = function() {
	   var lat=parseFloat(Coordonnees.split(",")[0]);
	   var lng=parseFloat(Coordonnees.split(",")[1]);
	   var coordinate=new google.maps.LatLng(lat, lng);

              queryList = [];
              queryList.push("SELECT NOM_COMM, CODE_DEPT,Nom_EPCI,Nom_Typologie, legende_acces_circuits_courts FROM ");
              queryList.push(tableid);
              queryList.push(" WHERE 'DepCom'=" + Depcom);
              query = encodeURIComponent(queryList.join(''));

              var gvizQuery = new google.visualization.Query(
                  'http://www.google.com/fusiontables/gvizdata?tq=' + query);



              gvizQuery.send(function(response) {
                var datatable = response.getDataTable();
		var NOM_COMM ='Pas de résultats';
		var CODE_DEPT ='Pas de résultats';
		var Nom_EPCI ='Pas de résultats';
		var Nom_Typologie ='Pas de résultats';
		var legende_acces_circuits_courts ='Pas de résultats';
                if (datatable && datatable.getNumberOfRows()) {
			var NOM_COMM =datatable.getValue(0, 0);
			var CODE_DEPT =datatable.getValue(0, 1);
			var Nom_EPCI =datatable.getValue(0, 2);
			var Nom_Typologie =datatable.getValue(0, 3);
			var legende_acces_circuits_courts =datatable.getValue(0, 4);
                }

                infoWindow.setContent('<div class="googft-info-window">' +
'<b style="font-weight:900;">Commune:</b> '+ NOM_COMM +' (' + CODE_DEPT + ')<br>' +
'<b style="font-weight:900;">Intercommunalité:</b> ' + Nom_EPCI + '<br>' +
'<b style="font-weight:900;">Type de commune:</b> ' + Nom_Typologie + '<br>' +
'<br><b>Temps minimum d\'accès à un distributeur de produits alimentaires en circuits courts:</b>' +
'<br>' + legende_acces_circuits_courts + '</div>');

                infoWindow.setPosition(coordinate);
                infoWindow.open(map);
		map.setCenter(coordinate);
              });
        };

//fin geocoder

        // Ajout légende
        var legend = document.createElement('div');
        legend.id = 'legend';
        var content = [];
        content.push('<h3>Accessibilité:</h3>');
        content.push('<p><div class="color_legende" style="background: #ffa264;"></div>Moins de 5 minutes</p>');
        content.push('<p><div class="color_legende" style="background: #ff8939;"></div>De 5 à 10 minutes</p>');
        content.push('<p><div class="color_legende" style="background: #ff6700;"></div>De 10 à 20 minutes</p>');
        content.push('<p><div class="color_legende" style="background: #c65000;"></div>De 20 à 30 mibutes</p>');
        content.push('<p><div class="color_legende" style="background: #9b3f00;"></div>Plus de 30 minutes</p>');
        content.push('<p><div class="color_legende" style="background: #616161;"></div>Information indisponible</p>');
        legend.innerHTML = content.join('');
        legend.index = 1;
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
        // Fin ajout légende

      }

      google.maps.event.addDomListener(window, 'load', initialize);