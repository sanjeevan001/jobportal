@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Job</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\JobController@update', $job->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $job->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('company', 'Company')}}
            {{Form::text('company', $job->company, ['class' => 'form-control', 'placeholder' => 'Company'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $job->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('qualifications', 'Qualifications')}}
            {{Form::textarea('qualifications', $job->qualifications, ['class' => 'form-control', 'placeholder' => 'Qualifications'])}}
        </div>
        <div class="form-group">
            {{Form::label('location', 'Location')}}
            {{Form::text('location', $job->location, ['class' => 'form-control', 'placeholder' => 'Location'])}}
        </div>
        <div class="form-group">
            {{Form::label('deadline', 'Application Deadline')}}
            {{Form::date('deadline', $job->deadline, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::file('logo')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
