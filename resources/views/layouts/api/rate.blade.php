<span ng-repeat="star in stars track by $index">
     <span ng-click="setRating( $index + 1 )" class="glyphicon {{ star }}"></span>
</span>