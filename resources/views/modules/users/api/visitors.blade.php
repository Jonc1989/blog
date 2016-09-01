<div class="col-md-3" ng-repeat="user in guests">
    <a href="/user/{{ user.id }}"><span ng-bind="user.user.name + ' '"></span><span ng-bind="user.user.surname"></span></a>
</div>