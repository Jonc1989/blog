@extends('layouts.app')

@section('content')

    <div class="col-md-9 clear-pads" ng-controller="GalleriesController">


        <div class="col-md-3" >
            <div class="panel panel-default">
                <div class="panel-heading">Kategorijas</div>

                <div class="panel-body">
                    <div><a ui-sref="all">Draugu</a></div>
                    <div><a ui-sref="mine">Manas</a></div>
                    <div><a ui-sref="create">Pievienot</a></div>
                </div>
            </div>
        </div>


        <div ui-view></div>
    </div>

@endsection