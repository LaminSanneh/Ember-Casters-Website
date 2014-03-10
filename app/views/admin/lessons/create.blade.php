@extends('admin.layouts.default')

@section('body')
<h2>Create Lesson</h2>
{{Form::open(array('route' => array('admin.lessons.store')))}}

@include('admin.lessons._form')

{{Form::submit('Create', array('class' => 'btn btn-success'))}}

{{Form::close()}}

@stop