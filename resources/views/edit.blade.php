@extends('default')
@section('content')
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-4">
       <div class="panel panel-default">
            <div class="panel-heading">Form User</div>
            <div class="panel-body">
               @foreach ($get_user as $data)
                    {!! @Form::open(array('route' => route_update, 'class' => 'test-form')) !!}
                    {!! @Form::hidden('id', $data->id) !!}
                    <div class="form-group">
                        {!! @Form::label('username') !!}
                        {!! @Form::text('username', $data->username,
                                        array('required',
                                                'class' => 'form-control',
                                                'placeholde' => 'username' )) !!}
                    </div>
                    <div class="form-group">
                        {!! @Form::label('email') !!}
                        {!! @Form::text('email',  $data->email,
                                        array('required',
                                                'class' => 'form-control',
                                                'placeholde' => 'email' )) !!}
                    </div>
                    <div class="form-group">
                        {!! @Form::label('password') !!}
                        {!! @Form::text('password',  $data->password,
                                        array('required',
                                                'class' => 'form-control',
                                                'placeholde' => 'password' )) !!}
                    </div>
                    <div class="form-group">
                        {!! @Form::submit('Update User',
                                            array('class' => 'btn btn-primary')) !!}
                    </div>
                    {!! @Form::close() !!}
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="col-md-8 col-sm-8 col-xs-8">  
        <div class="panel panel-default">
            <div class="panel-heading">List User</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>username</th>
                            <th>email</th>
                            <th>password</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{--*/ $i = 1 /*--}}
                        @foreach ($data_user as $data)

                            <tr>
                                <th>{{ $i++ }}</th>
                                <th>{{ $data->username }}</th>
                                <th>{{ $data->email }}</th>
                                <th>{{ $data->password }}</th>
                                <th><a href="{{ route('route_edit', ['id' => $data->id ]) }}">edit</a>
                                   <a href="{{ route('route_delete', ['id' => $data->id ]) }}" onclick="return confirm('Are you sure ?')">delete</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
@stop