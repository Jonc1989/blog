@extends('layouts.app')

@section('content')

    <div class="col-md-9 clear-pads" ng-controller="GalleriesController" ng-init="allGalleries()">
        <a href="/galleries/create">Pievienot</a>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Kategorijas</div>

                <div class="panel-body">
                    <div><a ng-click=""><div>Manas</div></a></div>
                    <div><a ng-click=""><div>Draugu</div></a></div>
                </div>
            </div>
        </div>

        <div class="col-md-6" >
            <div class="col-md-3" ng-repeat="gallery in galleries">

            </div>
        </div>
    </div>

@endsection