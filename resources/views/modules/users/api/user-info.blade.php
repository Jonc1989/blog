<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Profila info</div>
        <div class="panel-body">

            <div id="inf">
                <div><span ng-bind="user.name + ' '"></span><span ng-bind="user.surname"></span></div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div ng-bind="'Adrese: ' + user.address"></div>
    <div ng-bind="'Vecums: ' + user.year"></div>
    <div ng-bind="'E-pasts: ' + user.email"></div>
</div>

