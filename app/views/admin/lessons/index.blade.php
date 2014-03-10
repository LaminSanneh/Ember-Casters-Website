@extends('admin.layouts.default')

@section('body')
<h2>Lessons {{link_to_route('admin.lessons.create','+ New Lesson', null,array('class' => 'btn btn-primary'))}}</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>Title</th>
            <th>Embed Code</th>
            <th>Description</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($lessons as $lesson)
        <tr>
            <td>{{$lesson->title}}</td>
            <td>{{$lesson->embed_code}}</td>
            <td>{{$lesson->description}}</td>
            <td>
                {{Form::open(array('route' => array('admin.lessons.destroy', $lesson->id), 'method' => 'DELETE'))}}
                {{Form::submit('Delete', array('class' => 'btn btn-danger'))}}
                {{Form::close()}}
            </td>
            <td>
                {{ link_to_route('admin.lessons.edit','Edit',array($lesson->id), array('class' => 'btn btn-primary')) }}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@stop