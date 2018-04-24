

@extends('layouts.app')

@section('main-content')
    {!! Form::open(array('action' => 'web\UsersController@store')) !!}
    <section class="content-header">
        <div class="row">
            <div class="col-xs-6">
                <h1>New administrator</h1>
            </div>
            <div class="col-xs-6">
                {!! Form::submit('Save', array('class' => 'btn btn-success pull-right', 'data-loading-text' => 'Saving...')) !!}
                {{ link_to_route('users.index', 'Cancel', array(), array('class' => 'pull-right')) }}
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 form-errors">
                @if ($errors->has())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body clearfix">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        {!! Form::label('username', 'Username', array('class' => 'control-label label-required')) !!}
                                        {!! Form::text('username', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Phone number', null, array('class' => 'form-control')) !!}
                                        {!! Form::text('phone', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email', array('class' => 'control-label label-required')) !!}
                                        {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        {!! Form::label('password', 'Password', array('class' => 'control-label label-required')) !!}
                                        {!! Form::password('password', array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        {!! Form::label('password_confirmation', 'Confirm password', array('class' => 'control-label label-required')) !!}
                                        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                {!! Form::submit('Save', array('class' => 'btn btn-success pull-right', 'data-loading-text' => 'Saving...')) !!}
                {{ link_to_route('users.index', 'Cancel', array(), array('class' => 'pull-right')) }}
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@endsection


@section('main-content')

@endsection