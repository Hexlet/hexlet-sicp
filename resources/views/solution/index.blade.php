@extends('layouts.app')
@php
/**
 * @var \App\Models\Solution[]|\Illuminate\Support\Collection $solutions
 */
@endphp
@section('content')
    <div class="my-4">
        <section>

            @include('exercise.navigation')

            <h1 class="h3">{{ __('views.solution.index.header.h1') }}</h1>

            <div class="mb-3 mt-3">
                {{ Form::open(['url' => route('solutions.index'), 'method' => 'GET' , 'class' => 'form-inline']) }}
                {{ Form::select('filter[user_id]', $solutionAuthors, $filter['user_id'], ['placeholder' => __('views.solution.index.table_header.author'), 'class' => 'form-control mr-2']) }}
                {{ Form::select('filter[exercise_id]', $exerciseTitles, $filter['exercise_id'], ['placeholder' => __('views.solution.index.table_header.exercise'), 'class' => 'form-control mr-2']) }}
                {{ Form::submit(__('views.solution.index.filter.apply_button'), ['class' => 'btn btn-outline-primary']) }}
                <a href="{{ route('solutions.index') }}" class="btn btn-outline-secondary ml-3">
                    {{ __('views.solution.index.filter.reset_button') }}
                </a>
                {{ Form::close() }}
            </div>

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
                            <td>
                                <a class="text-decoration-none" href="{{ route('users.show', $solution->user) }}">
                                <img class="rounded-circle mr-1" width="30" height="30" src="{{ getProfileImageLink($solution->user) }}" alt="Profile image">
                                    {{ $solution->user->name }}
                                </a>
                            </td>
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
            {{ $solutions->links() }}
        </section>
    </div>
@endsection
