<input type="text" id="search-users" ng-model="searchKey" ng-change="search()" ng-blur="hideSearchResults()" ng-focus="showSearchResults()" placeholder="Meklēt..."/>
<div id="search-results" style="background: whitesmoke;position: absolute;">
    <div ng-repeat="user in searchResults" ng-click="showUser(user.id)">
        <span ng-bind="user.name"></span><span ng-bind="user.surname"></span>
    </div>
</div>