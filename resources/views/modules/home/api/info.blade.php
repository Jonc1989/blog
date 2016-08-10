<div ng-init="User(<?= \Auth::user()->id; ?>)" id="info">
    <div><span ng-bind="user.name + ' '"></span><span ng-bind="user.surname"></span></div>
</div>