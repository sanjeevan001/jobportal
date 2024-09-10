@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$job->title}}</h1>
    <p>{{$job->description}}</p>
    <small>Posted on {{$job->created_at}} by {{$job->company}}</small>
    <hr>
    <a href="/applications/create/{{$job->id}}" class="btn btn-primary">Apply</a>
</div>
@endsection
