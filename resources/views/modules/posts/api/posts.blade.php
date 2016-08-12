<div class="col-md-12">


       <!--         <textarea
                        class="form-control"
                        placeholder="Sper vaļā..."
                        ng-model="postContent"
                        rows="3">
                </textarea>
    <button
            type="button"
            ng-click="savePost()"
            class="btn btn-primary right">
        Publicēt
    </button>-->


</div>



<div class="posts col-md-12" >
    <div class="row post" ng-repeat="post in posts">
        <!--<div class="col-md-12">
            <div class="pull-right">
                <span ng-bind="post.created_at"></span>
            </div>
        </div>
        <div class="col-md-12">
            <div ng-bind="post.content"></div>
        </div>-->
        <div class="col-md-6"><input ng-model="address" ng-change="findCoordinates(address)" type="text" class="form-control"></div>
        <div class="col-md-12" id="map_canvas" ng-cloak>
            <ui-gmap-google-map  center="map.center" zoom="map.zoom"></ui-gmap-google-map>
        </div>


    </div>
    <div class="loader-wrap" style="position: relative"></div>


</div>
