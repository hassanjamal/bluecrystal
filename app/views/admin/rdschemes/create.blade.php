@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
<!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<!-- ./ tabs -->

{{-- Create User Form --}}
<form class="form-horizontal" method="post" action="@if (isset($rdscheme)){{ URL::to('admin/rd-schemes/' . $rdscheme->id . '/edit') }}@endif" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->

    <!-- Tabs Content -->
    <div class="tab-content">
        <!-- General tab -->
        <div class="tab-pane active" id="tab-general">
            <!-- Plan -->
            <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                <label class="col-md-3 control-label" for="name">Plan Name</label>
                <div class="col-md-3">
                    <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($rdscheme) ? $rdscheme->name : null) }}}" />
                    {{{ $errors->first('name', '<span class="help-inline">:message</span>') }}}
                </div>
            </div>
            <!-- ./ Plan -->

            <!-- No Of Years -->
            <div class="form-group {{{ $errors->has('years') ? 'error' : '' }}}">
                <label class="col-md-3 control-label" for="years">No Of Years</label>
                <div class="col-md-3">
                    <input class="form-control" type="text" name="years" id="years" value="{{{ Input::old('years', isset($rdscheme) ? $rdscheme->years : null) }}}" />
                    {{{ $errors->first('years', '<span class="help-inline">:message</span>') }}}
                </div>
            </div>
            <!-- ./ No Of Years -->

            <!-- Email -->
            <div class="form-group {{{ $errors->has('interest') ? 'error' : '' }}}">
                <label class="col-md-3 control-label" for="interest">Interest Rate</label>
                <div class="col-md-3">
                    <input class="form-control" type="text" name="interest" id="interest" value="{{{ Input::old('interest', isset($rdscheme) ? $rdscheme->interest : null) }}}" />
                    {{{ $errors->first('interest', '<span class="help-inline">:message</span>') }}}
                </div>
            </div>
            <div class="form-group {{{ $errors->has('special_interest') ? 'error' : '' }}}">
                <label class="col-md-3 control-label" for="special_interest">Special Interest Rate</label>
                <div class="col-md-3">
                    <input class="form-control" type="text" name="special_interest" id="special_interest" value="{{{ Input::old('special_interest', isset($rdscheme) ? $rdscheme->special_interest : null) }}}" />
                    {{{ $errors->first('interest', '<span class="help-inline">:message</span>') }}}
                </div>
            </div>

        </div>
        <!-- ./ general tab -->

    </div>
    <!-- ./ tabs content -->

    <!-- Form Actions -->
    <div class="form-group">
        <div class="col-md-offset-3 col-md-3">
            <element class="btn btn-danger close_popup">Cancel</element>
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">OK</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>
@stop
