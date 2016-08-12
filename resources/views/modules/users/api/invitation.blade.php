
<div ng-switch on="friendStatus">
    <button class="btn btn-primary" ng-switch-when="1" ng-click="">Atcelt uzaicinājumu</button>
    <button class="btn btn-primary" ng-switch-when="2" ng-click="">Draugi</button>
    <button class="btn btn-primary" ng-switch-when="3" ng-click="">Apstiprināt draudzību</button>
    <button class="btn btn-primary" ng-switch-default ng-click="invite()">Uzaicināt</button>
</div>