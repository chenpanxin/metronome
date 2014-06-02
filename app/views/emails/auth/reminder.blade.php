<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="container">
        <h3 style="color:#6f8092;">{{ Lang::get('locale.reset_password') }}</h3>
        <a href="{{ URL::to('password/reset', [$token]) }}" style="color:#419bf0;">{{ URL::to('password/reset', [$token]) }}</a>
    </div>
</body>
</html>
