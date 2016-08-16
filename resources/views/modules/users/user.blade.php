@extends('layouts.app')

@section('content')
    <search></search>


            <div class="col-md-12 col-md-offset-0" ng-controller="UserController" ng-init="init(<?= $id ?>)">

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
                    <div ng-bind="'Adrese: ' + user.address"></div>
                    <div ng-bind="'Vecums: ' + user.year"></div>
                    <div ng-bind="'E-pasts: ' + user.email"></div>
                </div>

                <div class="col-md-6">
                    <invitation friendid="<?= $id ?>" myid="<?= Auth::user()->id ?>"></invitation>
                </div>
            </div>

            <div class="col-md-9 col-md-offset-0">


                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a ui-sref="posts({ id: <?= $id ?>})">Posts</a>
                            <a ui-sref="friends({ id: <?= $id ?>})">Friends</a>
                        </div>
                        <div class="panel-body">

                            <div ui-view></div>
                        </div>
                    </div>
                </div>

            </div>


@endsection
