@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="page-header">
	<h1>Login into your account</h1>
</div>
<form class="form-horizontal" method="POST"  accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <fieldset>
        <div class="form-group">
            <label class="col-md-3 control-label" for="email">Email</label>
            <div class="col-md-7">
                <input class="form-control" tabindex="1" placeholder="Email" type="text" name="email" id="email" value="{{ Input::old('email') }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="password">
                Password
            </label>
            <div class="col-md-7">
                <input class="form-control" tabindex="2" placeholder="Password" type="password" name="password" id="password">
            </div>
        </div>

       <!--  <div class="form-group">
            <div class="col-md-offset-3 col-md-7">
                <div class="checkbox">
                    <label for="remember">Remember Me
                        <input type="hidden" name="remember" value="0">
                        <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                    </label>
                </div>
            </div>
        </div> -->

        @if ( Session::get('error') )
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        @if ( Session::get('notice') )
        <div class="alert">{{ Session::get('notice') }}</div>
        @endif

        <div class="form-group">
            <div class="col-md-offset-3 col-md-7">
                <button tabindex="3" type="submit" class="btn btn-primary">Submit</button>
<!--                 <a class="btn btn-default" href="forgot">Forgot Password</a>
 -->            </div>
        </div>
    </fieldset>
</form>
</div>
</div>

@stop
