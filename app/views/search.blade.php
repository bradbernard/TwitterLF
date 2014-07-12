<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Searching for {{{ $data['username'] }}}</title>

        @include('header')

</head>
<body>

    @include('nav', array('search' => $data['username']))

    <div class="container" id="searchBox">
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

        @if (count($data['search']) < 20)
            <div id="searchDone" class='alert alert-info' role='alert' style='margin-top:15px;'><strong>Uh oh!</strong> You have reached the end of the search results.</div>
        @endif
    </div>

    <script type="text/javascript">

        var twitterPage = '2';
        var twitterSearch = '{{ $data['username'] }}';
        var maxSearch = <?php echo (count($data['search']) < 20 ? 'true' : 'false'); ?>;

        String.prototype.linkify_tweet = function() {
            var tweet = this.replace(/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig,"<a href='$1'>$1</a>");
            tweet = tweet.replace(/(^|\s)@(\w+)/g, "$1<a target='_blank' href=\"http://www.twitter.com/$2\">@$2</a>");
            return tweet.replace(/(^|\s)#(\w+)/g, "$1<a target='_blank' href=\"http://search.twitter.com/search?q=%23$2\">#$2</a>");
        };

        function loadSearch(username, pageId)
        {
            $.get("./" + username + "/" + pageId, function(data)
            {
                if(data)
                {
                    var data = jQuery.parseJSON(data);
                    if(data.length == 0)
                    {
                        maxSearch = true;
                    }
                    else if(data.length == 20)
                    {
                        twitterPage++;
                    }

                    $.each(data, function(index, value)
                    {
                        $("#searchBox").append("<div class='media' style= 'border: 1px solid; border-radius: 10px; padding: 15px; padding-bottom: 10px;'> <a class='pull-left' href='../user/" + value.screen_name + "'> <img class='media-object' style='border: 2px solid white; border-radius: 10px; width: 64px; height: 64px;' src='" + value.profile_image_url + "' alt='" + value.screen_name  + "'> </a> <div class='media-body'> <h3 class='media-heading'><span style='font-size:19px;'>" + value.name + "</span> <span style='font-size:15px;'> | <a href='../user/" + value.screen_name + "'>@" + value.screen_name + "</a></span></h3> <p>" + value.description.linkify_tweet() + "</p> </div> </div>");
                    });

                    if(maxSearch)
                    {
                        $("#searchBox").append("<div class='alert alert-info' role='alert' style='margin-top:15px;'><strong>Uh oh!</strong> You have reached the end of the search results.</div>")
                    }

                }

                $(window).scroll(function()
                {
                    if($(window).scrollTop() + $(window).height() > $(document).height() - 200)
                    {
                        $(window).unbind('scroll');

                        if(!maxSearch)
                        {
                            loadSearch(twitterSearch, twitterPage);
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
                if(!maxSearch)
                {
                    loadSearch(twitterSearch, twitterPage);
                }
            }
        });
    </script>

</body>
</html>
