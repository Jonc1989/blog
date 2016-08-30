<div class="col-md-6" >
    <div>Visas</div>
    <div class="col-md-4 clear-pads" ng-repeat="item in galleryData">
        <div class="gallery">
            <a href="">
                <div class="images" ng-repeat="image in item.files | limitTo:4">
                    <img ng-src="/image/{{item.user.id}}/{{item.id}}/{{image.file_name}}">
                </div>
            </a>
        </div>
        <div><a href="/galleries/{{ item.id }}"> <span ng-bind="item.name + ' '"></span></a></div>
        <div><span ng-bind="item.user.name + ' '"></span><span ng-bind="item.user.surname"></span></div>
    </div>
</div>