<ul class="list comment">
    @foreach ($comments as $comment)
        <li>
            <div class="avatar">{{ HTML::image($comment->user->avatar_url) }}</div>
            <p class="meta"><a href="">{{ $comment->user->username }}</a><span data-time="{{ $comment->created_at }}">40 minutes ago</span><a href="" class="pull_right">{{ Lang::get('locale.reply') }}</a></p>
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
