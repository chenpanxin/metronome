<ul class="list comment">
    @foreach ($comments as $comment)
        <li>
            <div class="avatar">{{ HTML::image($topic->user->avatar_url) }}</div>
            <p class="meta"><a href="">{{ $topic->user->username }}</a><span data-time="{{ $comment->created_at }}">40 minutes ago</span><a href="" class="pull_right">reply</a></p>
            <div class="content">
                {{{ $comment->content }}}
                @foreach ($comment->replies as $reply)
                    <p class="reply"><a href="">Laravel Says: </a>{{ $reply->content }}</p>
                @endforeach
            </div>
        </li>
    @endforeach
</ul>
