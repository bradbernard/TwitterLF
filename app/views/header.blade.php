<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.min.css">
<script src="http://timeago.yarp.com/jquery.timeago.js"></script>

<style>
body
{
    padding-top: 70px;
    padding-bottom: 50px;
}
</style>

<script>
String.prototype.linkify_tweet = function() {
    var tweet = this.replace(/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig,"<a target='_blank' href='$1'>$1</a>");
    tweet = tweet.replace(/(^|\s)@(\w+)/g, "$1<a target='_blank' href=\"http://www.twitter.com/$2\">@$2</a>");
    return tweet.replace(/(^|\s)#(\w+)/g, "$1<a target='_blank' href=\"http://search.twitter.com/search?q=%23$2\">#$2</a>");
};

function search()
{
    if(window.location.href.indexOf("user") > -1 || window.location.href.indexOf("search") > -1)
    {
        var url = '../search/' + $("#searchBar").val();
    }
    else
    {
        var url = './search/' + $("#searchBar").val();
    }

    window.location.href = url;
}
</script>
