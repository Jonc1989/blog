<div class="col-md-3" ng-repeat="user in users">
    <a href="/user/{{ user.visitor.id }}"><span ng-bind="user.visitor.name + ' '"></span><span ng-bind="user.visitor.surname"></span></a>
</div>