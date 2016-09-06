@extends('layouts.app')

@section('content')

    <div class="md-9 clear-pads" ng-controller="MessagesController">
        @include('modules.messages.sidebar')
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Messages<span style="float: right"><button ng-click="newMessage()" class="btn btn-primary btn-xs">Jauna vēstule</button></span></div>

                <div class="panel-body">
                    @include('modules.messages.content')
                </div>
            </div>
        </div>
    </div>

@endsection
