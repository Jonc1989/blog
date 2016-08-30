@extends('layouts.app')

@section('content')
    <search></search>


    <div class="col-md-9 col-md-offset-0" ng-controller="UserEditController" ng-init="init(<?= $id ?>)">

    <!--<user-info id="<?= $id ?>"></user-info>-->
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

            <div class="col-md-12 clear-pads">
                <span>Vārds: </span><input type="text" class="form-control right" placeholder="..." ng-model="user.name">
            </div>
            <div class="col-md-12 clear-pads">
                <span>Uzvārds: </span><input type="text" class="form-control right"  ng-model="user.surname">
            </div>
            <div class="col-md-12 clear-pads">
                <span>Adrese: </span><input type="text" class="form-control right"  ng-model="user.address">
            </div>
            <div class="col-md-12 clear-pads">
                <span>Vecums: </span><input type="text" class="form-control right"  ng-model="user.year">
            </div>
            <div class="col-md-12 clear-pads">
                <span>E-pasts: </span><input type="text" class="form-control right"  ng-model="user.email">
            </div>

            <button type="button" class="btn btn-primary btn-sm" ng-click="saveUser()">Saglabāt</button>
        </div>


    </div>

    <div class="col-md-9 col-md-offset-0">




    </div>


@endsection
