@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Call Scheduler test application') }}</div>

                <div class="card-body">
                    <u>
                        <li>
                            <a href="{{ route('schedules.list') }}">{{ __('Check scheduled calls') }}</a>
                        </li>
                        <li>
                            {{ __('Create a new call') }}
                        </li>
                        <li>
                            {{ __('Check archive') }}
                        </li>
                    </u>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
