@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Employees</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Employees</li>
    </ul>

    <div class="row">
        <div class="col-md-12">

            <div class="tile shadow">

                <form action="{{ route('dashboard.employees.index') }}">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="search" autofocus class="form-control" placeholder="Search" value="{{ request()->search }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="company_id" class="form-control">
                                    <option value="">All Companies</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" {{ $company->id == request()->company_id ? 'selected' :  '' }}>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                <a href="{{ route('dashboard.employees.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>

                    </div><!-- end of row -->

                </form><!-- end of form -->

                @if ($employees->count() > 0)

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @php
                            if(!empty($employees)){
                                $index = $employees->currentPage() * $employees->perPage() - $employees->perPage() + 1;
                            }
                        @endphp

                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>
                                    <a href="{{ route('dashboard.employees.edit', $employee->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('dashboard.employees.destroy', $employee->id) }}" method="post" style="display: inline-block;">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $employees->appends(request()->query())->links() }}

                @else

                    <h4 style="font-weight: 400;">Sorry no data found</h4>

                @endif

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->


@endsection