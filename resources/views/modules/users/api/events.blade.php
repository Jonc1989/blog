<div class="col-md-12 clear-pads">
    <div ng-repeat="event in events" class="col-md-3">

    <div ng-switch="event.type">
        <div ng-switch-when="gallery">
            <a href="/galleries#/show/{{event.data.id}}">
                <span ng-bind="event.name"></span>
                <span ng-bind="event.updated_at" class="pull-right"></span>
                <div ng-repeat="img in event.data.images" class="col-md-6">
                    <img ng-src="/image/{{event.data.user_id}}/{{event.data.id}}/{{img.file_name}}">
                </div>
            </a>
        </div>
        <div ng-switch-when="friends">friends</div>
        <div ng-switch-default>...</div>
    </div>


    </div>
</div>