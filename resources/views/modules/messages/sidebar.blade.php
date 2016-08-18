<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Pēdējie sūtītāji</div>

        <div class="panel-body">
            <div ng-repeat="user in users">
                <a ng-click="getMessagesFromUser( user.id )"><div><span ng-bind="user.name + ' '"></span><span ng-bind="user.surname"></span></div></a>

            </div>
        </div>
    </div>
</div>