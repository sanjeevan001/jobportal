@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Apply for {{$job->title}}</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\ApplicationController@store', $job->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Full Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Full Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
        <div class="form-group">

        {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
        </div>
        <div class="form-group">
            {{Form::label('resume', 'Resume')}}
            {{Form::file('resume')}}
        </div>
        <div class="form-group">
            {{Form::label('cover_letter', 'Cover Letter')}}
            {{Form::textarea('cover_letter', '', ['class' => 'form-control', 'placeholder' => 'Cover Letter'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection