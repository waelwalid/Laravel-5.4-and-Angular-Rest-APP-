@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                >
                @if(\Request::session()->get('reg_msg'))
                    <div class="alert alert-success" role="alert">{{\Request::session()->get('reg_msg')}}</div>
                @endif

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-md-4 control-label">Gender:</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label><input type="radio" @if(old('gender') == 1 AND old('gender') != '') {{'checked="checked"'}}  @endif value="1" name="gender">Male</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" @if(old('gender') == 0 AND old('gender') != '') {{'checked="checked"'}}  @endif value="0" name="gender">Female</label>
                                </div>
                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Hobbies:</label>
                            <div class="col-md-6">
                                <label class="checkbox-inline"><input @if(old('hobbies.0')) {{'checked="checked"'}}  @endif name="hobbies[0]" type="checkbox" value="1">Coding</label>
                                <label class="checkbox-inline"><input @if(old('hobbies.1')) {{'checked="checked"'}}  @endif name="hobbies[1]" type="checkbox" value="2">Searching</label>
                                <label class="checkbox-inline"><input @if(old('hobbies.2')) {{'checked="checked"'}}  @endif name="hobbies[2]" type="checkbox" value="3">Learning</label>

                            @if ($errors->has('hobbies.*'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hobbies') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
