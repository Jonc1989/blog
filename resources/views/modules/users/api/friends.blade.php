<div class="col-md-3" ng-repeat="user in users">
    <a href="/user/{{ user.id }}"><span ng-bind="user.name + ' '"></span><span ng-bind="user.surname"></span></a>
</div>