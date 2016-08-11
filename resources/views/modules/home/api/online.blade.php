<div class="panel panel-default">
    <div class="panel-heading">Online</div>
    <div class="panel-body">
        <div ng-repeat="user in users">
            <span ng-bind="user.name"></span><span ng-bind="user.surname"></span>
        </div>
    </div>
</div>