<div class="panel panel-default">
    <div class="panel-heading">Online</div>
    <div class="panel-body">
        <div ng-repeat="user in users">
            <a href="/user/{{user.id}}"><span ng-bind="user.name"></span><span ng-bind="user.surname"></span></a>
        </div>
    </div>
</div>