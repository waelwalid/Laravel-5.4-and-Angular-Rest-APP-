@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile Update </div>
                    @if(\Request::session()->get('status'))
                        <div class="alert alert-success" role="alert">{{\Request::session()->get('status')}}</div>
                    @endif

                    @if ($errors->has('close_reason'))
                        <div class="alert alert-success" role="alert">{{$errors->first('close_reason')}}</div>
                    @endif
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('profile/update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-2">
                                <label for="name" class=" control-label">Profile image</label>
                                <img style="max-width: 100px; padding: 20px;" src="@if($user->image != ''){{url("storage/app/".$user->image)}} @else {{'https://cdn.pixabay.com/photo/2012/04/26/19/43/profile-42914_960_720.png'}} @endif">
                                <br>
                                <input type="file" name="image" />
                            </div>

                            <div class="col-md-10">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="@if(old('name') != ''){{ old('name') }}@else{{ $user->name }}@endif" required autofocus>

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
                                    <input id="email" type="email" class="form-control" name="email" value="@if(old('email') != ''){{ old('email') }}@else{{ $user->email }}@endif" required>

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
                                    <input id="password" type="password" class="form-control" name="password" >

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-md-4 control-label">Gender:</label>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" @if(old('gender') == 1 AND old('gender') != '') {{'checked="checked"'}} @elseif($user->gender == 1) {{'checked="checked"'}}  @endif value="1" name="gender">Male</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" @if(old('gender') == 0 AND old('gender') != '') {{'checked="checked"'}} @elseif($user->gender == 0) {{'checked="checked"'}}  @endif value="0" name="gender">Female</label>
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
                                    <label class="checkbox-inline"><input @if(old('hobbies.0')) {{'checked="checked"'}} @elseif(@in_array(1,@$user->hobbies) AND old('hobbies.0') == '') {{'checked="checked"'}} @endif name="hobbies[0]" type="checkbox" value="1">Coding</label>
                                    <label class="checkbox-inline"><input @if(old('hobbies.1')) {{'checked="checked"'}} @elseif(@in_array(2,@$user->hobbies) AND old('hobbies.1') == '') {{'checked="checked"'}} @endif name="hobbies[1]" type="checkbox" value="2">Searching</label>
                                    <label class="checkbox-inline"><input @if(old('hobbies.2')) {{'checked="checked"'}} @elseif(@in_array(3,@$user->hobbies) AND old('hobbies.2') == '') {{'checked="checked"'}} @endif name="hobbies[2]" type="checkbox" value="3">Learning</label>
                                    @if ($errors->has('hobbies.*'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('hobbies.*') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Close Account !</button>

                                </div>
                            </div>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Close Account</h4>
                    </div>
                    <form  role="form" method="POST" action="{{ url('profile/close') }}">
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="message-text" class="control-label">Close Reason (Required):</label>
                                <textarea class="form-control" name="close_reason" id="message-text"></textarea>
                            </div>
                        {{ csrf_field() }}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" value="Submit" type="button" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
@endsection