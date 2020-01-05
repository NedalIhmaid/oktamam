@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Employees</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.employees.index') }}">Employees</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form action="{{ route('dashboard.employees.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('put') }}
                    {{ csrf_field() }}

                    @include('dashboard.partials._errors')
                    <div class="row">

                        {{--first name--}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $employee->first_name) }}">
                            </div>
                        </div><!-- end of col -->

                        {{--last name--}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $employee->last_name) }}">
                            </div>
                        </div><!-- end of col -->

                    </div><!-- end of row -->

                    {{--email--}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}">
                    </div>

                    {{--phone--}}
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone) }}">
                    </div>

                    {{--company id--}}
                    <div class="form-group">
                        <label>Company</label>
                        <select name="company_id" class="form-control">
                            <option value="">Select Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection