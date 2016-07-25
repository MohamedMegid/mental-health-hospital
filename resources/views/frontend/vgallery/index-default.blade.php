
<ul class="youtube-videogallery">
@foreach ($albums as $album)
<h1>{{$album->name}}</h1>
    @foreach ($videos as $video)
        <li><a href="{{$video->link}}">{{$video->name}}</a></li>
    @endforeach
@endforeach

</ul>