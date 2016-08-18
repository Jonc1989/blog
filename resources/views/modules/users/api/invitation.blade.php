
<div ng-switch on="friendStatus">
    <button class="btn btn-sm btn-primary" ng-click="changeFriendshipStatus()" ng-bind="friendStatusText"></button>
    <button ng-if="friendStatus == 3" class="btn btn-sm btn-primary" ng-click="cancelFriendRequest()" ng-bind="cancelText"></button>
</div>