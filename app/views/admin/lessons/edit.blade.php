@extends('admin.layouts.default')

@section('body')
<h2>Edit Lesson</h2>
{{Form::open(array('route' => array('admin.lessons.update', $lesson->id), 'method' => 'PUT'))}}

@include('admin.lessons._form')

{{Form::submit('Update', array('class' => 'btn btn-success'))}}

{{Form::close()}}

@stop