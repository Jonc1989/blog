<div class="col-md-12 clear-pads">
    <div ng-repeat="event in events" class="col-md-3">

    <div ng-switch="event.type">
        <div ng-switch-when="gallery">
            <a href="/galleries#/show/{{event.id}}">
                <span ng-bind="event.name"></span>
                <span ng-bind="event.updated_at" class="pull-right"></span>
                <div ng-repeat="img in event.images" class="col-md-6">
                    <img ng-src="/image/{{event.user_id}}/{{event.id}}/{{img.file_name}}">
                </div>
            </a>
        </div>
        <div ng-switch-when="friends">friends</div>
        <div ng-switch-default>...</div>
    </div>


    </div>
</div>