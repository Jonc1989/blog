<div class="col-md-12">
    <div class="like" ng-click="like()" ng-class="{ 'blue': likes.length }"></div>
    <div ng-if="likes.length" class="like-count">{{ likes.length }}</div>
</div>