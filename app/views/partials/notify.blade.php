@if (Session::has('msg'))
    <div class="alert notify">
        <p>{{ Session::get('msg') }}</p>
    </div>
@endif
