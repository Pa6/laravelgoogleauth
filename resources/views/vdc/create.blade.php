

@extends('layouts.app')

@section('main-content')
    {!! Form::open(array('action' => 'web\VdcAgentController@store')) !!}
    <section class="content-header">
        <div class="row">
            <div class="col-xs-6">
                <h1>New vdc</h1>
            </div>
            <div class="col-xs-6">
                {!! Form::submit('Save', array('class' => 'btn btn-success pull-right', 'data-loading-text' => 'Saving...')) !!}
                {{ link_to_route('vdcs.index', 'Cancel', array(), array('class' => 'pull-right')) }}
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
                                        {!! Form::label('agent_first_name', 'First name', array('class' => 'control-label label-required')) !!}
                                        {!! Form::text('agent_first_name', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        {!! Form::label('agent_last_name', 'Last Name', null, array('class' => 'form-control')) !!}
                                        {!! Form::text('agent_last_name', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6 col-lg-6">

                                    <div class="form-group">
                                        <label for="photo">Agent group status</label>
                                        {!! Form::select('agent_group_status', array('0' => 'x', '1' => 'y'), null, array('class' => 'form-control')) !!}
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
                {{ link_to_route('vdcs.index', 'Cancel', array(), array('class' => 'pull-right')) }}
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@endsection


@section('main-content')

@endsection