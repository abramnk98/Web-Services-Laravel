@extends('admin.layout.app')

@section('page-title', '| Create Employee')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Create Service</h1>
        <form method="post" action="{{route('admin.employees.store')}}">
            @csrf
            <div class="form-group col-6 mt-1 mb-1">
                <label for="name">Name</label>
                <input type="text" class="form-control mt-2" id="name" name="name" placeholder="Full Name">

                @error('name')
                    <small class="alert-danger">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group col-6 mt-1 mb-1">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control mt-2" id="job_title" name="job_title" placeholder="Job Title">

                @error('Job_Title')
                    <small class="alert-danger">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group col-6 mt-1 mb-1">
                <label for="phone">Phone</label>
                <input type="number" class="form-control mt-2" id="phone" name="phone" placeholder="Phone Number">

                @error('phone')
                    <small class="alert-danger">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group col-6 mt-1 mb-1">
                <label for="address">Address</label>
                <input type="text" class="form-control mt-2" id="address" name="address" placeholder="Building st.street,Government, city ">

                @error('address')
                    <small class="alert-danger">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group col-6 mt-1 mb-1">
                <label for="facebook_url">Facebook</label>
                <input type="text" class="form-control mt-2" id="facebook_url" name="facebook_url" placeholder="Facebook profile link" value="facebook/id/">

                @error('facebook_url')
                <small class="alert-danger">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group col-6 mt-1 mb-1">
                <label for="twitter_url">Twitter</label>
                <input type="text" class="form-control mt-2" id="twitter_url" name="twitter_url" placeholder="Twitter profile link" value="twitter/id/">

                @error('twitter_url')
                <small class="alert-danger">{{$message}}</small>
                @enderror

            </div>
            <div class="form-group col-6 mt-1 mb-1">
                <label for="instagram_url">Instagram</label>
                <input type="text" class="form-control mt-2" id="instagram_url" name="instagram_url" placeholder="Instagram profile link" value="instagram/id/">

                @error('address')
                <small class="alert-danger">{{$message}}</small>
                @enderror

            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection
