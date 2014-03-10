<div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', $lesson->title, array('class' => 'form-control', 'placeholder' => 'Title'))}}
</div>

<div class="form-group">
    {{Form::label('embed_code', 'Embed Code')}}
    {{Form::textarea('embed_code', $lesson->embed_code,
    array('class' => 'form-control', 'placeholder' => 'Embed Code'))}}
</div>

<div class="form-group">
    {{Form::label('description', 'Description')}}
    {{Form::textarea('description', $lesson->description,
    array('class' => 'form-control tiny-mce', 'placeholder' => 'Description'))}}
</div>