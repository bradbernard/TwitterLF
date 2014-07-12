<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{{ $data['username'] }}}'s Tweets</title>

        @include('header')

</head>
<body>

    @include('nav')

    <div class="container">
            <div class="media" style= "padding: 15px; padding-bottom: 10px;">
                <div class="media-body">
                    <h1 class="media-heading">Recent Tweets from <a target="_blank" href="{{ Twitter::linkUser($data['username']) }}">@{{{ $data['username'] }}}</a></h2>
                </div>
            </div>
        @foreach ($data['tweets'] as $tweet)
            <div class="media" style= "border: 1px solid; border-radius: 10px; padding: 15px; padding-bottom: 10px;">
                <a target="_blank" class="pull-left" href="{{ $tweet->user->profile_image_url }}">
                    <img class="media-object" style="border: 2px solid white; border-radius: 10px; width: 64px; height: 64px;" src="{{ $tweet->user->profile_image_url }}" alt="{{{ $data['username'] }}}">
                </a>
                <div class="media-body">
                    <h3 class="media-heading"><span style="font-size:19px;"><a target="_blank" href="{{ Twitter::linkUser($data['username']) }}">@{{{ $data['username'] }}}</a></span> <span style="font-size:15px;"> | <a target="_blank" href="{{ Twitter::linkTweet($tweet) }}">{{ Twitter::ago($tweet->created_at) }}</a></span></h3>
                    <p>{{ Twitter::linkify($tweet->text) }}</p>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
