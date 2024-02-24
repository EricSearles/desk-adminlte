@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Permissão</th>
                                        <th>Alterar Nivel Acesso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($usersAccessLevels as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->level }}</td>
                                        <td>
                                            <div class="icheck-primary icheck-inline">
                                                @foreach($accessLevels as $accessLevel)
                                                    <input
                                                        type="radio"
                                                        id="{{ $accessLevel->id }}"
                                                        name="nivel"
                                                        @if($user->level_id == $accessLevel->id)
                                                        checked="true"/>
                                                        @endif
                                                    <label for="radio"> {{ $accessLevel->name }} </label>
                                                @endforeach
                                            </div>
                                        </td>
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
