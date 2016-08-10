@extends('layouts.app')

@section('content')
    <search></search>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Profila info</div>
                        <div class="panel-body">
                            <info id="<?= $id ?>"></info>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-md-offset-0">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Sīka info</div>
                        <div class="panel-body">
                            Murr
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Wall</div>
                        <div class="panel-body">
                            Custom Shiat
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Online</div>
                        <div class="panel-body">
                            Custom Shiat
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
