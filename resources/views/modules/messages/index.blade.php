@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('modules.messages.sidebar')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Messages</div>

                    <div class="panel-body">
                        Message blade php
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
