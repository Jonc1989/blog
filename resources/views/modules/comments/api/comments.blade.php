<div class="col-md-12" >
    <button ng-if="!ready" class="btn btn-primary btn-xs pull-right" ng-click="comment()">Komentēt</button>
    <div ng-show="ready" style="position: relative;">
        <input type="text" class="form-control" ng-model="commentBody">
        <span class="close close-input" ng-click="close()">&times;</span>
        <button class="btn btn-primary btn-xs pull-right" ng-click="saveComment()">Saglabāt</button>
    </div>

    <div class="col-md-12 comments clear-pads">
        <div class="col-md-12 comment" ng-repeat="comment in comments">
            <div><span ng-bind="comment.user.name"></span>&nbsp;<span ng-bind="comment.user.surname"></span></div>
            <div>
                <span ng-bind="comment.text"></span>&nbsp;<span ng-bind="comment.updated_at"></span>
            </div>
        </div>
    </div>

</div>