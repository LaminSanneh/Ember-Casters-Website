<div class="container-fluid">
    <div class="row">
        <h1>Learn something new about emberJs today!</h1>
    </div>
    <div class="row">
        <div class="col-md-4 nopadding">
            <ul class="list-group">
                <li class="list-group-item">Lessons</li>
                @foreach($lessons as $currentLesson)
                    @if($lesson->id == $currentLesson->id)
                        <li class="list-group-item">
                            <p class="bg-success">
                                {{link_to_route('viewLesson',$currentLesson->title,array($currentLesson->id, urlencode($currentLesson->title)))}}
                            </p>
                        </li>
                    @else
                        <li class="list-group-item">{{link_to_route('viewLesson',$lesson->title,array($lesson->id, urlencode($lesson->title)))}}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-md-8">
            <h2>{{$lesson->title}}</h2>
            <div class="row lesson-video-container">
                {{$lesson->embed_code}}
            </div>
        </div>
    </div>
</div>