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

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sendMessage">
                        Vēstule
                    </button>
                    <!--<button type="button" class="btn btn-primary btn-sm" ng-click="ngMessage()">
                        Vēstule ar ngDialog
                    </button>-->

                    <!-- Modal -->
                    <div class="modal fade" id="sendMessage" tabindex="-1" role="dialog" aria-labelledby="sendMessageLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    <textarea class="form-control" placeholder="Sper vaļā..." rows="3" ng-model="messageBody" ng-change="checkMessageBody()"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Aizvērt</button>
                                    <button type="button" ng-disabled="disabled" class="btn btn-primary" data-dismiss="modal" ng-click="sendMessage()">Sūtīt</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-9 col-md-offset-0">


                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a ui-sref="posts({ id: <?= $id ?>})">Posts</a>
                            <a ui-sref="friends({ id: <?= $id ?>})">Friends</a>
                            <a ng-if="<?= \Auth::user()->id == $id ?>" ui-sref="visitors">Viesi</a>
                        </div>
                        <div class="panel-body">

                            <div ui-view></div>
                        </div>
                    </div>
                </div>

            </div>


@endsection
