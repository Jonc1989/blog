@extends('layouts.app')

@section('content')
    <search></search>


            <div class="col-md-12 col-md-offset-0"  ng-controller="UserController" ng-init="init(<?= \Auth::user()->id; ?>, <?= $id; ?>)">

                <!--<user-info id="<?= $id ?>"></user-info>-->
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Profila info</div>
                        <div class="panel-body">

                            <div id="inf">
                                <div><span ng-bind="user.name + ' '"></span><span ng-bind="user.surname"></span> <a ng-if="<?= \Auth::user()->id == $id ?>" href="{{user.id}}/edit"><span class="right">Profils</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div ng-bind="'Adrese: ' + user.address"></div>
                    <div ng-bind="'Vecums: ' + user.year"></div>
                    <div ng-bind="'E-pasts: ' + user.email"></div>
                </div>

                <div class="col-md-6" ng-if="<?= \Auth::user()->id != $id ?>">
                    <invitation friendid="<?= $id ?>" myid="<?= Auth::user()->id ?>"></invitation>
                    <send-message user-id="<?= $id ?>"></send-message>
                </div>


            </div>

            <div class="col-md-9 col-md-offset-0">


                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a ui-sref="posts({ id: <?= $id ?>})">Posti</a>
                            <a ui-sref="friends({ id: <?= $id ?>})">Draugi</a>
                            <a ng-if="<?= \Auth::user()->id == $id ?>" ui-sref="visitors">Viesi</a>
                            <a ui-sref="events({ id: <?= $id ?>})">Notikumi</a>
                        </div>
                        <div class="panel-body">

                            <div ui-view></div>
                        </div>
                    </div>
                </div>

            </div>


@endsection
