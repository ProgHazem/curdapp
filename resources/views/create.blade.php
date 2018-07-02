@extends('layouts.app')
@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Oh snap!</strong>
                    @foreach($errors->all() as $error)
                        <ul>
                            <li>{{$error}}</li>
                        </ul>
                    @endforeach
            </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">Create New Student Info</h2>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('store')}}" method="post">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="form-group">
                            <label for="inputfname" class="col-md-2 control-label">First Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="inputfname" name="firstname" placeholder="Enter First Name . . .">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputlname" class="col-md-2 control-label">Last Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="inputlname" name="lastname" placeholder="Enter Last Name . . .">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-md-2 control-label">Email</label>

                            <div class="col-md-10">
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter Email . . .">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputphone" class="col-md-2 control-label">Phone</label>
                            <div class="col-md-10">
                                <input type="tel" class="form-control" id="inputphone" name="phone" placeholder="Enter Phone Number . . .">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection