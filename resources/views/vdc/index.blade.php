

@extends('layouts.app')

@section('main-content')

    <section class="content-header">

        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> {!! session('message') !!}</h4>
            </div>
        @endif

        <div class="row">
            <div class="col-xs-6">
                <h1>VDC</h1>
            </div>
            <div class="col-xs-6">
                <a href="{{ route('vdcs.create') }}" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i>New vdc
                </a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table id="financial-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no-wrap padding-right-20">First Name</th>
                                <th class="no-wrap padding-right-20">Last Name</th>
                                <th class="no-wrap padding-right-20">Agent group status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $row)

                                <tr class="clickable-row" data-url="{{ route('vdcs.edit', array($row->id)) }}">
                                    <td>{{ $row->agent_first_name }}</td>
                                    <td>{{ $row->agent_last_name }}</td>
                                    <td>{{ $row->agent_group_status }}</td>

                                    <td class="actions no-wrap text-right">
                                        <a class="btn btn-sm btn-info"
                                           href="{{ route('vdcs.edit', array($row->id)) }}"
                                           data-toggle="tooltip" data-placement="bottom" title="Edit">
                                            <i class="fa fa-edit fa-no-text"></i></a>

                                        {{--@if($user->id != Auth::user()->id)--}}
                                        {{--<div class="modal-tooltip" data-toggle="tooltip"--}}
                                        {{--data-placement="bottom" title="Delete">--}}
                                        {{--<a class="btn btn-sm btn-danger" href="#" data-toggle="modal"--}}
                                        {{--data-remote="{{ route('users.confirm', $user->id) }}"--}}
                                        {{--data-action="refresh">--}}
                                        {{--<i class="fa fa-trash fa-no-text"></i></a>--}}
                                        {{--</div>--}}
                                        {{--@endif--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="no-wrap padding-right-20">First Name</th>
                                <th class="no-wrap padding-right-20">Last Name</th>
                                <th class="no-wrap padding-right-20">Agent group status</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('main-content')

@endsection










{{--by Pascal--}}