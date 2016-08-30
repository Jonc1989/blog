@extends('layouts.app')

@section('content')

    <div class="col-md-9 clear-pads" ng-controller="GalleriesController">


        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Kategorijas</div>

                <div class="panel-body">
                    <div><a ng-click="friendGalleries()">Draugu</a></div>
                    <div><a ng-click="mineGalleries( <?= \Auth::id()?> )">Manas</a></div>
                    <div><a href="/galleries/create">Pievienot</a></div>
                </div>
            </div>
        </div>

        @include('modules.galleries.api.all')
    </div>

@endsection