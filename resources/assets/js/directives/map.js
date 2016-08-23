app.directive('map', function () {
    return {
        link: function(scope, elem, attrs) {
            var div= $('<div/>', { id: 'map_' + attrs.id });
            $(elem).append( div );
            var map = new google.maps.Map(document.getElementById('map_' + attrs.id), {
                center: {lat: parseFloat(attrs.latitude), lng: parseFloat(attrs.longitude) },
                zoom: 13,
                mapTypeId: 'roadmap'
            });
        }
    }
});