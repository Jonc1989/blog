<div class="col-md-9" >
    <div>list</div>
    <div class="gallery col-md-4 clear-pads" ng-repeat="item in galleryData">
        <div class="">
            <a ui-sref="show({ id: item.id })">
                <div class="col-md-6 clear-pads images" ng-repeat="image in item.images | limitTo:4">
                    <img ng-src="/image/{{item.user.id}}/{{item.id}}/{{image.file_name}}">
                </div>
            </a>
            <div class="col-md-12"><a ui-sref="show({ id: item.id })"> <span ng-bind="item.name + ' '"></span></a></div>
            <div class="col-md-12"><span ng-bind="item.user.name + ' '"></span><span ng-bind="item.user.surname"></span></div>
        </div>

    </div>
</div>