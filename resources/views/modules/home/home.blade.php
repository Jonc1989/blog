@extends('layouts.app')

@section('content')
<search></search>

        <div class="col-md-12 col-md-offset-0">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Profila info</div>
                    <div class="panel-body">
                        <info ng-attr-id="<?= \Auth::user()->id; ?>"></info>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-md-offset-0">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Sīka info</div>
                    <div class="panel-body">
                        Murr
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Wall</div>
                    <div class="panel-body">
                        <posts ng-attr-userid=""></posts>
                    </div>
                </div>
            </div>


        </div>

@endsection
