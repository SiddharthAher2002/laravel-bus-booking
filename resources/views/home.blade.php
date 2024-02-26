@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <div class="mb-3">
                            <a class="btn btn-outline-info" href="{{ url('/home') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline" style="margin-right:10px">Home</a>
                        </div>
                        <div class="mb-3">

                            <a class="btn btn-outline-primary" href="{{ route('bus.reg.show') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Bus Register</a>
                        </div>
                        <div class="mb-3">
                            <a class="btn btn-outline-primary" href="{{ route('home') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">User Booking</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
