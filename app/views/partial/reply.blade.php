<div class="boxify">
    <ul class="reply index">
        @foreach ($replies as $reply)
            <li class="r-{{ $reply->id }}">
                <a href="{{ URL::to($reply->user->username) }}" class="avatar s42">{{ HTML::image($reply->user->avatar_url) }}</a>
                <a href="{{ URL::to($reply->user->username) }}" class="username">{{ $reply->user->username }}</a>
                <span class="date timeago" title="{{ $reply->created_at }}"></span>
                @if (Auth::check() and Auth::user()->id == $reply->user->id)
                    <a href="{{ URL::to('reply/'.$reply->id) }}" class="delete" data-method="delete" data-remote="true"><span class="icon-delete"></span></a>
                @endif
                <div class="content markdown">{{ $reply->texts->first()->markup; }}</div>
            </li>
        @endforeach
    </ul>
</div>
