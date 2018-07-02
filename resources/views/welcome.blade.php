@extends('layouts.app')
@section('content')
    @if(session('success_mesage'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Well done!</strong> {{session('success_mesage')}}
        </div>
    @endif
    @if(session('success_mesage2'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Well done!</strong> {{session('success_mesage2')}}
        </div>
    @endif

    @if(session('success_mesage3'))
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Well done!</strong> {{session('success_mesage3')}}
        </div>
    @endif

    <div class="container">
        <h1 class="text-center"> All Students </h1>
        <table class="table table-bordered table-striped table-hover ">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th class="text-center">Edit / Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>
                        <td class="text-center">
                            <a type="submit" class="btn btn-raised btn-sm btn-primary" href="{{route('edit',$student->id)}}"><i class="fa fa-lg fa-pencil-square-o" area-hidden="true"></i></a>  ||
                            <form method="post" action="{{route('delete',$student->id)}}" id="delete-form-{{$student->id}}" style="display: none;">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                            </form>
                            <button onclick="if(confirm('Are You Sure To Delete This Student?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{$student->id}}').submit();
                                    }else{
                                    event.preventDefault();
                                    }" class="btn btn-raised btn-sm btn-danger"><i class="fa fa-lg fa-trash-o" area-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$students->links()}}
    </div>
@endsection