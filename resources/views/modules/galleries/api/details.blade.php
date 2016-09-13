
    <div class="col-md-9 galleries clear-pads" >
        <div class="title"> {{ gallery.name }}</div>

        <div class="col-md-3 images clear-pads" ng-repeat="image in gallery.images">

            <a href="" ng-click="open(image)">
                <img ng-src="/image/{{gallery.user.id}}/{{gallery.id}}/{{image.file_name}}">
            </a>
        </div>
    </div>

    <comments ng-if="gallery.id" post-id="gallery.id" user-id="<?= \Auth::id() ?>" type="'gallery'"></comments>

    <div class="modal fade" tabindex="-1" role="dialog" id="imageModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div style="display: inline-block;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul class="pager">
                            <li class="previous" ng-click="previous()"><a href="#"> < </a></li>
                            <li class="next" ng-click="next()"><a href="#"> > </a></li>
                        </ul>

                        <div class="col-md-9">
                            <img ng-src="/image/{{gallery.user.id}}/{{gallery.id}}/{{currentImagePath}}">
                        </div>
                        <div class="col-md-3 clear-pads">

                            <div>
                                <span ng-bind="gallery.user.name + ' '"></span><span ng-bind="gallery.user.surname"></span>
                                <span ng-bind="gallery.created_at"></span>
                            </div>

                            <div > Komentāri</div>{{currentImageId}}
                            <comments ng-if="currentImageId" post-id="currentImageId"
                                      user-id="<?= \Auth::id() ?>" type="'image'"></comments>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>