<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TwitterLF - Brad Bernard</title>

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
        <div class="jumbotron">
            <h1>TwitterLF</h1>
            <br/><p>This is a simple application developed with the Laravel framework using the Twitter package. &nbsp;It is hosted on Forge. &nbsp;Packages used are Laravel, Laravel Forge, and Twitter API for Laravel 4. &nbsp;All credits go to their respective owners. </p><br/>
            <p>
                <div class="btn-group">
                    <button type="button" class="btn btn-info btn-lg" style="border: 1px solid white;"><span class="glyphicon glyphicon-off" style="top: 2.5px;"></span> &nbsp; Start by</button>
                    <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown" style="border: 1px solid white;">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="./search/google">Searching for a user</a></li>
                      <li><a href="./user/github">Viewing a users profile</a></li>
                    </ul>
                </div>

                <a class="btn btn-success btn-lg pull-right" target="_blank" role="button" href="https://github.com/bradbernard/TwitterLF/"><span class="glyphicon glyphicon-save" style="top: 2.5px;"></span>&nbsp; Fork me</a>
            </p>
        </div>
    </div>

</body>
</html>
