@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <style>
        label {
            margin-right: 8px;
        }
    </style>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Users') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

{{--                    <div class="alert alert-info">--}}
{{--                        Sample table page--}}
{{--                    </div>--}}

                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Nivel Acesso</th>
                                        <th>Alterar Para: </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @foreach($user->accessLevels as $accessLevelUser)
                                        <td>{{ $accessLevelUser->user_role }}</td>

                                        <td>
                                            <div class="icheck-primary icheck-inline md-5">
                                                @foreach($accessLevels as $level)
                                                    <input
                                                        type="radio"
                                                        id="{{ $level->id }}"
                                                        name="nivel{{ $level->id }}"
                                                        @if($accessLevelUser->id == $level->id)
                                                        checked="true"/>
                                                        @endif
                                                    <label for="nivel{{ $level->id }}"> {{ $level->user_role }}  </label>
                                                @endforeach
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $users->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
