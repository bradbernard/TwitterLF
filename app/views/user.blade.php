<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{{ $data['username'] }}}'s Tweets</title>

        @include('header')

</head>
<body>

    @include('nav')

    <div class="container" id="tweetBox">
            <div class="media" style= "padding: 15px; padding-bottom: 10px;">
                <div class="media-body">
                    <h1 class="media-heading">Recent Tweets from <a target="_blank" href="{{ Twitter::linkUser($data['username']) }}">@{{{ $data['username'] }}}</a></h2>
                </div>
            </div>
        <?php $maxId = 0; ?>
        @foreach ($data['tweets'] as $tweet)

                <?php $maxId = $tweet->id; ?>

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

        @if (count($data['tweets']) == 0)
            <div class='alert alert-info' role='alert' style='margin-top:15px;'><strong>Uh oh!</strong> You have reached the end of this users tweets.</div>
        @endif
    </div>

    <script type="text/javascript">
        var twitterMaxId = '{{ $maxId }}';
        var twitterUsername = '{{ $data['username'] }}';
        var maxTweets = <?php echo (count($data['tweets']) == 0 ? 'true' : 'false'); ?>

        function loadTweets(username, maxId)
        {
            $.get("./" + username + "/" + maxId, function(data)
            {
                if(data)
                {
                    var data = jQuery.parseJSON(data);
                    if(data.length == 0)
                    {
                        maxTweets = true;
                    }

                    $.each(data, function(index, value)
                    {
                        $("#tweetBox").append("<div class='media' style= 'border: 1px solid; border-radius: 10px; padding: 15px; padding-bottom: 10px;'> <a target='_blank' class='pull-left' href='" + value.user.profile_image_url + "'> <img class='media-object' style='border: 2px solid white; border-radius: 10px; width: 64px; height: 64px;' src='" +  value.user.profile_image_url + "' alt='" + value.user.screen_name + "'> </a> <div class='media-body'> <h3 class='media-heading'><span style='font-size:19px;'><a target='_blank' href='https://twitter.com/" + value.user.screen_name + "'>@" + value.user.screen_name + "</a></span> <span style='font-size:15px;'> | <a target='_blank' href='https://twitter.com/" + value.screen_name + "/" + value.id_str + "'>" + jQuery.timeago(value.created_at) + "</a></span></h3> <p>" + value.text.linkify_tweet() + "</p> </div> </div>");
                        twitterMaxId = value.id_str;
                    });

                    if(maxTweets)
                    {
                        $("#tweetBox").append("<div class='alert alert-info' role='alert' style='margin-top:15px;'><strong>Uh oh!</strong> You have reached the end of this users tweets.</div>")
                    }
                }

                $(window).scroll(function()
                {
                    if($(window).scrollTop() + $(window).height() > $(document).height() - 200)
                    {
                        $(window).unbind('scroll');

                        if(!maxTweets)
                        {
                            loadTweets(twitterUsername, twitterMaxId);
                        }
                    }
                });

            });
        }

        $(window).scroll(function()
        {
            if($(window).scrollTop() + $(window).height() > $(document).height() - 200)
            {
                $(window).unbind('scroll');
                if(!maxTweets)
                {
                    loadTweets(twitterUsername, twitterMaxId);
                }
            }
        });
    </script>

</body>
</html>
