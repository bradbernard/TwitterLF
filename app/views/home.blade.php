<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TwitterLF - Brad Bernard</title>

        @include('header')

</head>
<body>

    @include('nav')

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
