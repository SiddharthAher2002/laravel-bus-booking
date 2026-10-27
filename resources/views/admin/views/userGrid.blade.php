@extends('layouts.adminLte.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><i class="fas fa-users mr-2"></i>User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Registered Users</h3>
                    <div class="card-tools">
                        <form method="GET" action="{{ route('admin.users') }}" class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="searchTxt" class="form-control float-right" placeholder="Search name or email" value="{{ $searchTxt ?? '' }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                                @if(!empty($searchTxt))
                                    <a href="{{ route('admin.users') }}" class="btn btn-default" title="Clear search">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-striped text-nowrap align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 80px;">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Registered On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td><strong>#{{ $user->id }}</strong></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->user_type === 'admin')
                                            <span class="badge badge-danger px-2 py-1"><i class="fas fa-shield-alt mr-1"></i> Admin</span>
                                        @else
                                            <span class="badge badge-info px-2 py-1"><i class="fas fa-user mr-1"></i> Customer</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at ? $user->created_at->format('M d, Y h:i A') : 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="fas fa-user-slash fa-2x mb-2 d-block"></i>
                                        No users found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($users->hasPages())
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {{ $users->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
