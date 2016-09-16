<div class="container">

    @if (\Session::has('message'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('message') !!}</li>
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form novalidate class="form-horizontal" name="form" role="form" method="POST" action="<?= url('/login') ?>" ng-submit="onSubmit($event)">
                        <?= csrf_field() ?>

                        <div class="form-group" ng-class="{'has-error': form.email.$invalid }">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email"
                                       ng-model="formData.email"
                                       ng-blur="blurEmail()"
                                       type="email"
                                       class="form-control"
                                       name="email"
                                       ng-pattern="EMAIL"
                                       value="<?= old('email') ?>">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong><?= $errors->first('email') ?></strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" ng-class="{'has-error': form.password.$invalid }">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password"
                                       ng-model="formData.password"
                                       type="password"
                                       class="form-control"

                                       name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong><?= $errors->first('password') ?></strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="<?= url('/password/reset') ?>">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>