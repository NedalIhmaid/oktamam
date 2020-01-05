@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Companies</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.companies.index') }}">Companies</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form action="{{ route('dashboard.companies.update', $company->id) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('put') }}
                    {{ csrf_field() }}

                    @include('dashboard.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}">
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $company->email) }}">
                    </div>

                    {{--logo--}}
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control">
                        <img src="{{ $company->logo_path }}" style="margin-top: 10px; width: 100px; height: 100px;" alt="">
                    </div>

                    {{--website--}}
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" name="website" class="form-control" value="{{ old('website', $company->website) }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection