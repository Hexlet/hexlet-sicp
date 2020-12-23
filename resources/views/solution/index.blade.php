@extends('layouts.app')
@php
/**
 * @var \App\Solution[]|\Illuminate\Support\Collection $solutions
 */
@endphp
@section('content')
    <div class="my-4">
        <section>
            <h2 hidden>Solutions</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>{{ __('views.solution.index.table_header.author') }}</td>
                            <td>{{ __('views.solution.index.table_header.exercise') }}</td>
                            <td>{{ __('views.solution.index.table_header.date') }}</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($solutions as $solution)
                        <tr>
                            <td>{{ $solution->user->name }}</td>
                            <td>
                                <a href="{{ route('exercises.show', $solution->exercise) }}">
                                    {{ $solution->exercise->path }} {{ getExerciseTitle($solution->exercise) }}
                                </a>
                            </td>
                            <td>{{ $solution->created_at }}</td>
                            <td>
                                <a href="{{ route('solutions.show', $solution) }}">
                                    {{ __('views.solution.index.show_action') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
