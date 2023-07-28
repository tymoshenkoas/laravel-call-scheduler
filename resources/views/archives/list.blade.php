@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Archive') }}</div>

                <div class="card-body">
                    <archive-table :route="'{{ route('archives.list') }}'"></schedule-table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection