<div class="panel panel-default" ng-if="invitations.length">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#invitations">Uzaicinājumi</a>
        </h4>
    </div>
    <div id="invitations" class="panel-collapse collapse in">
        <div class="panel-body">
            <div ng-repeat="user in invitations">
                <span ng-bind="user.name + ' '"></span>
                <span ng-bind="user.surname + ' '"></span>
                <span><button class="btn btn-primary" ng-click="accept( user.user_id )">Apstiprināt</button></span>
            </div>
        </div>
    </div>
</div>