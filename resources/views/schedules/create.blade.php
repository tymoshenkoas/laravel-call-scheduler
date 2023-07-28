@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a new scheduled call') }}</div>

                <div class="card-body">
                    <schedule-create-form :route="'{{ route('schedules.store') }}'"></schedule-create-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
