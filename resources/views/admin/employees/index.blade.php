@extends('admin.layout.app')

@section('page-title', '| Pages')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Employees</h1>
        <div class="text-end">
            <a class="btn btn-primary" href="{{route('admin.employees.create')}}">Create Employee</a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Profile</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
            @php ($i = 1)
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->job_title}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->address}}</td>
                    <td>
                        <h6 class="alert-primary">Facebook: {{$employee->profile->facebook_url}}</h6>
                        <h6 class="alert-primary">Twitter: {{$employee->profile->twitter_url}}</h6>
                        <h6 class="alert-primary">Instagram: {{$employee->profile->instagram_url}}</h6>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.employees.edit', ['employee' => $employee->id])}}">Edit</a>
                        <form action="{{route('admin.employees.destroy', ['employee' => $employee->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
