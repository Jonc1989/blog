app.directive("scroll", [ 'MessageService', function ( MessageService ) {
    return {
        link: function(scope, element, attrs) {
            if( attrs.authId != scope.message.sender_id ){
                setTimeout(function () {
                    check();
                    angular.element($('#' + attrs.parent )).bind("scroll", function() {
                        check()
                    });
                    console.log( attrs);
                    function check() {
                        if( scope.message.readed == 0 ){
                            var diff = $('#' + attrs.parent).offset().top + $('#' + attrs.parent).height();
                            if ( diff > $( '#' + attrs.id).offset().top ) {

                                setAsReaded();

                            }
                        }
                    }

                    function setAsReaded() {
                        setTimeout(function () {
                            scope.message.readed = 1;
                            MessageService.markReaded( scope.message ).then( function ( response ) {
                                console.log(response)
                            });
                            if( !scope.$$phase )
                            {
                                scope.$apply( function () {
                                    scope.message.readed = 1;
                                });
                            }
                        }, 1000);
                    }
                },300);
            }
        }
    }

}])