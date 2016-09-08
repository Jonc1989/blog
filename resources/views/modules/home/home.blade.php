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
            <div class="cube-wrap">
                <div class="cube">Hallo!</div>
                <div class="cube sleeping">Hallo!</div>
            </div>



        </div>
        <div class="col-md-9 col-md-offset-0">
            <div class="col-md-4">


                <div class="panel-group" id="accordion">
                    <invitations></invitations>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#comments">Komentāri</a>
                            </h4>
                        </div>
                        <div id="comments" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>....</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8" style="margin-bottom: 50px;">
                <div class="panel panel-default">
                    <div class="panel-heading">Wall</div>
                    <div class="panel-body">
                        <posts ng-attr-auth-id="<?= \Auth::user()->id; ?>"></posts>
                    </div>
                </div>
            </div>


        </div>

@endsection
