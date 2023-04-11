@extends('layouts.app')
@section('description'){{ __('about.description') }}@endsection
@section('content')
    <h1 class="my-4">About project</h1>
    <p>Welcome to the open-source project Hexlet SICP!</p>
    <p>Hexlet SICP is a service for those studying the book "Structure and Interpretation of Computer Programs". Track
        your progress and match yourself against others on the global leaderboard.</p>
    <h4>Features</h4>
    <div>
        <ul>
            <li>Track read chapters</li>
            <li>View the global leaderboard and other users' progress</li>
            <li>Track user activity</li>
            <li>Discuss chapters and exercises</li>
            <li>Track finished exercises</li>
        </ul>
    </div>
    <h4>What does the rating depend on?</h4>
    <p>The rating depends on the number of chapters read and exercises performed. For each completed chapter and
        exercises, you get points that increase your rating. Exercises in the rating have more weight, practice is above
        all! :)</p>
    <h4>Guidelines</h4>
    <p><a href="https://github.com/hexlet-boilerplates/sicp-racket" target="_blank">Repository with Racket settings for the SICP</a></p>
    <p><a href="https://www.youtube.com/watch?v=-J_xL4IGhJA&list=PLE18841CABEA24090" target="_blank">MIT Video course</a></p>
    <p><a href="https://github.com/Hexlet/hexlet-sicp" target="_blank">Participate in the project (source code)</a></p>
@endsection
