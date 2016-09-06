app.directive("scroll", function () {
    return {
        //restrict: 'A',
        // scope:      {
        //     message:  '@'
        // },
        link: function(scope, element, attrs, ctrl) {
            scope.readed = attrs.readed;

                angular.element($('#' + attrs.parent )).bind("scroll", function() {
                    if( scope.readed == 0 ){
                        var diff = $('#' + attrs.parent).offset().top + $('#' + attrs.parent).height();
                        if ( diff > $(element).offset().top ) {
                            scope.readed = 1;
                            console.log('lasīta');
                        } else {
                            console.log('nelasīta')
                        }
                    }
                });

        },
        controller: function ($scope, $element, $attrs) {
            $scope.changeStatus = function ( e ) {
                console.log( e );
            }
        }
    }

})