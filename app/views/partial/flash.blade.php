@if (Session::has('message'))
    <div class="message flash">
        <p>{{ Session::get('message') }}</p>
    </div>
@endif
