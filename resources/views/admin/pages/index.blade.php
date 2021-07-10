@extends('admin.layout.app')

@section('page-title', '| Pages')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Pages</h1>
        <div class="text-end">
            <a class="btn btn-primary" href="{{route('admin.pages.create')}}">Create Page</a>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">Option</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @php ($i = 1)
            @foreach($pages as $page)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$page->name}}</td>
                    <td>{{$page->link}}</td>
                    <td>
                        <form action="{{route('admin.pages.changestatus', ['page' => $page->id])}}" method="post">
                            @csrf
                            @method('PUT')

                            @if($page->status === 'on')

                                <input type="submit" class="btn btn-secondary" name="status" value="off">
                            @else
                                <input type="submit" class="btn btn-success" name="status" value="on">
                            @endif

                        </form>

                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.pages.edit', ['page' => $page->id])}}">Edit</a>
                        <form action="{{route('admin.pages.destroy', ['page' => $page->id])}}" method="post">
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
