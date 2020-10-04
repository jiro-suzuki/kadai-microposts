    @if (Auth::user()->is_favorites($micropost->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete', 'class' => 'd-inline']) !!}
            {!! Form::submit('Unfavorite', ['class' => 'btn btn-success btn-sm']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id], 'class' => 'd-inline']) !!}
            {!! Form::submit('Favorite', ['class' => 'btn btn-light btn-sm']) !!}
        {!! Form::close() !!}                       
    @endif

