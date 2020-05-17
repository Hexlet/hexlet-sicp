@extends('layouts.app')
@php
/** @var \Illuminate\Support\Collection $rating */
@endphp
@section('content')
    <div class="my-4">
        @include('rating.menu')

        <h3>{{ __('rating.page_title') }}</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('rating.positions') }}</th>
                        <th>{{ __('rating.user') }}</th>
                        <th>{{ __('rating.number_of_points') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rating as $position => ['user' => $user, 'points' => $points])
                        <tr>
                            <td>{{ $position }}</td>
                            <td><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
                            <td>{{ $points }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
