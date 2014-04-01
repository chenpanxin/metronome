<ul class="categories">
    @foreach ($categories as $category)
        <li><a href="">{{ $category->name }}</a></li>
    @endforeach
</ul>
