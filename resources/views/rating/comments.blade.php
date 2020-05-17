@extends('layouts.app')
@section('content')
    <div class="row my-4">
        <div class="col-12 my-4">
            @include('rating.menu')

            <h3>{{ __('rating.page_title_comments') }}</h3>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('rating.positions') }}</th>
                            <th>{{ __('rating.user') }}</th>
                            <th>{{ __('rating.number_of_comments') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($commentsRating as $position => ['user' => $user, 'commentsCount' => $commentsCount])
                            <tr>
                                <td>{{ $position }}</td>
                                <td><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
                                <td>{{ $commentsCount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
