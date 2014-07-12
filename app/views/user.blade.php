<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{{   $data['username']  }}}'s Tweets</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.min.css">

        <style>
            body
            {
                padding-top: 70px;
                padding-bottom: 50px;
            }
        </style>

        <script>
        function search()
        {
            var url = '../search/' + $("#searchBar").val();
            window.location.href = url;
        }
        </script>

</head>
<body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#wattup">TwitterLF</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/TwitterLF/">Home</a></li>
            <li><a target="_blank" href="https://github.com/bradbernard/TwitterLF/">Source Code</a></li>
          </ul>
           <form class="navbar-form navbar-right" role="search" id="searchForm">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" placeholder="Search for a user" id="searchBar">
                </div>
            </div>
            <button onclick="search(); return false;" class="btn btn-warning">Search</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </div>

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
