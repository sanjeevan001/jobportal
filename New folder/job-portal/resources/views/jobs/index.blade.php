@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Job Listings</h1>
    @if(count($jobs) > 0)
        <ul class="list-group">
            @foreach($jobs as $job)
                <li class="list-group-item">
                    <a href="/jobs/{{$job->id}}">{{$job->title}}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No jobs found</p>
    @endif
</div>
@endsection
