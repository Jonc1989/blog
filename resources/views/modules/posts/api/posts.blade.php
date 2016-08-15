<div class="col-md-12">
    <form name="postForm"  enctype="multipart/form-data">
        <div class="col-md-12">
            <textarea
                class="form-control"
                placeholder="Sper vaļā..."
                ng-model="postContent"
                rows="3">
            </textarea>
        </div>
        <div class="col-md-12" >
            <div class="col-md-3 post-image" ng-repeat="f in files">
                <div class="icon-wrap" ng-click="deleteImage(f.id, f.img_name)">
                    <img class="" ng-src="/img/icons/close-icon.png">
                </div>
                <img class="" ngf-src="f">

            </div>
        </div>
        <div class="col-md-12">
            <button class="btn" ngf-select ng-model="files" ngf-multiple="true">Pievienot attēlus</button>
            <button class="btn" ng-click="addLocation()">Pievienot atrašanās vietu</button>
            <input id="search-box" />


        </div>
        <div class="col-md-12">
            <input class="btn btn-primary" ng-click="savePost()" value="Publicēt">
        </div>

    </form>

</div>



<div class="posts col-md-12" >
    <div class="row post" ng-repeat="post in posts">
        <div class="col-md-12">
            <div class="pull-right">
                <span ng-bind="post.created_at"></span>
            </div>
        </div>
        <div class="col-md-12">
            <div ng-bind="post.content"></div>
        </div>
        <div class="col-md-6"><input ng-model="address" type="text" class="form-control"></div>
        <div class="col-md-12" id="map_canvas" ng-cloak>
            <ui-gmap-google-map  center="map.center" zoom="map.zoom"></ui-gmap-google-map>
        </div>



    </div>
    <div class="loader-wrap" style="position: relative" ng-class="{ hidden : !loading}">Loading</div>

    <button class="btn" ng-click="getPosts()" ng-hide="current_page == last_page">Vairāk</button>
</div>

