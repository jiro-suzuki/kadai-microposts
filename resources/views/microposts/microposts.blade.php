@if (count($microposts) > 0)
<ul class="list-unstyled">
    @foreach ($microposts as $micropost)
    <li class="media mb-3">
        <img class="mr-2 rouded" src="{{ Gravatar::get($micropost->user->email, ['size' => 50]) }}" alt="">
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $micropost->user->name , ['user' => $micropost->user->id]) !!}
                <span class="text-muted">posted at {{ $micropost->created_at }}</span>
            </div>
            <div>
                <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
            </div>
            <div>
                @include('favorites.favorite_button')
                
                @if (Auth::id() === $micropost->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete', 'class' => 'd-inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
    @endforeach
    
    {{ $microposts->links() }}
</ul>
@endif