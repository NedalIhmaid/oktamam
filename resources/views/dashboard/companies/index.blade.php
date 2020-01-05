@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Companies</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Companies</li>
    </ul>

    <div class="row">
        <div class="col-md-12">

            <div class="tile shadow">

                <form action="{{ route('dashboard.companies.index') }}">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="search" autofocus class="form-control" placeholder="Search" value="{{ request()->search }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                <a href="{{ route('dashboard.companies.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                            </div>
                        </div>

                    </div><!-- end of row -->

                </form><!-- end of form -->

                @if ($companies->count() > 0)

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Employees Count</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @php
                            if(!empty($companies)){
                                $index = $companies->currentPage() * $companies->perPage() - $companies->perPage() + 1;
                            }
                        @endphp

                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td>{{ $company->employees_count }}</td>
                                <td>
                                    <a href="{{ route('dashboard.companies.edit', $company->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{ route('dashboard.companies.destroy', $company->id) }}" method="post" style="display: inline-block;">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $companies->appends(request()->query())->links() }}

                @else

                    <h4 style="font-weight: 400;">Sorry no data found</h4>

                @endif

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->


@endsection