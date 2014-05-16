<ul class="list comment">
    @foreach ($comments as $comment)
        <li>
            <a href="{{ URL::to('user/'.$comment->user->username) }}" class="avatar">{{ HTML::image($comment->user->avatar_url) }}</a>
            <p class="meta">
                <a href="{{ URL::to('user/'.$comment->user->username) }}" name="comment-{{ $comment->id }}">{{ $comment->user->username }}</a>
                <span data-time="{{ $comment->created_at }}">40 minutes ago</span>
                @if (Auth::check() and Auth::user()->id == $comment->user->id)
                    <a href="{{ URL::to('topic/'.$topic->id.'/comment/'.$comment->id) }}" class="pull_right edit">{{ Lang::get('locale.edit') }}</a>
                    <a href="{{ URL::to('topic/'.$topic->id.'/comment/'.$comment->id) }}" class="pull_right delete">{{ Lang::get('locale.delete') }}</a>
                @else
                    <!-- <a href="" class="pull_right">{{ Lang::get('locale.reply') }}</a> -->
                @endif
            </p>
            <p class="content">{{{ $comment->content }}}</p>
            <ul class="reply">
                @foreach ($comment->replies as $reply)
                    <li>
                        <span class="avatar">{{ HTML::image($reply->user->avatar_url) }}</span>
                        <p class="meta"><a href="">{{ $reply->user->username }}<span>40 minutes ago</span></a></p>
                        <p class="reply-content">{{ $reply->content }}</p>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
