<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Searching for {{{ $data['username'] }}}</title>

        @include('header')

</head>
<body>

    @include('nav')

    <div class="container">
            <div class="media" style= "padding: 15px; padding-bottom: 10px;">
                <div class="media-body">
                    <h1 class="media-heading">Searching for <span>@</span>{{ $data['username'] }}</h2>
                </div>
            </div>
        @foreach ($data['search'] as $user)
            <div class="media" style= "border: 1px solid; border-radius: 10px; padding: 15px; padding-bottom: 10px;">
                <a class="pull-left" href="../user/{{ $user->screen_name }}">
                    <img class="media-object" style="border: 2px solid white; border-radius: 10px; width: 64px; height: 64px;" src="{{ $user->profile_image_url }}" alt="{{{ $user->screen_name }}}">
                </a>
                <div class="media-body">
                    <h3 class="media-heading"><span style="font-size:19px;">{{ $user->name }}</span> <span style="font-size:15px;"> | <a href="../user/{{ $user->screen_name }}">@{{{ $user->screen_name }}}</a></span></h3>
                    <p>{{ Twitter::linkify($user->description) }}</p>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
