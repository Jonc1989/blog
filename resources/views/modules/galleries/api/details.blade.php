
    <div class="col-md-9 galleries clear-pads" >
        <div class="title"> {{ gallery.name }}</div>

        <div class="col-md-3 images clear-pads" ng-repeat="image in gallery.images">

            <a href="" ng-click="open(image)">
                <img ng-src="/image/{{gallery.user.id}}/{{gallery.id}}/{{image.file_name}}">
            </a>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="imageModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul class="pager">
                        <li class="previous" ng-click="previous()"><a href="#"> < </a></li>
                        <li class="next" ng-click="next()"><a href="#"> > </a></li>
                    </ul>
                    <img ng-src="/image/{{gallery.user.id}}/{{gallery.id}}/{{currentImagePath}}">
                </div>
            </div>
        </div>
    </div>