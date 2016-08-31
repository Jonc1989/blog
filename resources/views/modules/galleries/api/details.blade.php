
    <div class="col-md-6 galleries" >
        <div class="title"> {{ gallery.name }}</div>

        <div class="col-md-4 images" ng-repeat="image in gallery.files">

            <!--<a href="" ng-click="open(image)">-->
                <img ng-src="/image/{{gallery.user.id}}/{{gallery.id}}/{{image.file_name}}">
            <!--</a>-->
        </div>
    </div>

