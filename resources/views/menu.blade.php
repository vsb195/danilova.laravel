<div id="menu">
    <ul>
    @foreach($menu as $item)
        <li>{{$item->title}}</li>
    @endforeach
    </ul>
</div>
