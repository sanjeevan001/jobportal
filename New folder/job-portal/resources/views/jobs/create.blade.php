@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Job</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\JobController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('company', 'Company')}}
            {{Form::text('company', '', ['class' => 'form-control', 'placeholder' => 'Company'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('qualifications', 'Qualifications')}}
            {{Form::textarea('qualifications', '', ['class' => 'form-control', 'placeholder' => 'Qualifications'])}}
        </div>
        <div class="form-group">
            {{Form::label('location', 'Location')}}
            {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Location'])}}
        </div>
        <div class="form-group">
            {{Form::label('deadline', 'Application Deadline')}}
            {{Form::date('deadline', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::file('logo')}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
