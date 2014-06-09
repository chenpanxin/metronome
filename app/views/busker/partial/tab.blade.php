<ul class="tab inverse">
    {{ HTML::easyTab('topic', false, Request::segment(2)) }}
    {{ HTML::easyTab('category', false, Request::segment(2)) }}
    {{ HTML::easyTab('user', false, Request::segment(2)) }}
</ul>
