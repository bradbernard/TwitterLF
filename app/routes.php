<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
        return View::make('home');
});

Route::get('user/{username?}', function($username = null)
{
        if(!$username)
        {
            return "The username is blank. Go <a href='javascript:history.back()'>back</a> to where you were.";
        }

        $validator = Validator::make(
            array('username' => $username),
            array('username' => array('required', 'min:1', 'max:15', 'Regex:/^([A-Za-z0-9_]*)$/'))
        );

        if ($validator->fails())
        {
            return "Invalid username. Go <a href='javascript:history.back()'>back</a> to where you were.";
        }

        $userTweets = Twitter::getUserTimeline(array('screen_name' => $username, 'count' => 20, 'exclude_replies' => true));
        //dd($userTweets);

        if(!$userTweets)
        {
            return "The user @{$username} has not tweeted yet. Go <a href='javascript:history.back()'>back</a> to where you were.";
        }

        if(!is_array($userTweets))
        {
            if(property_exists($userTweets, 'errors'))
            {
                $errorString = null;

                if(count($userTweets->errors) > 1)
                {
                    $errorString .= 'Errors have occured.';
                }
                else
                {
                    $errorString .= 'An error has occured.';
                }

                foreach($userTweets->errors as $tError)
                {
                    if($tError->code == 34)
                    {
                        return "The user {$username} does not exist. Go <a href='javascript:history.back()'>back</a> to where you were.";
                    }

                    $errorString .= "<p>Error Code #{$tError->code}: {$tError->message}</p>";
                }


                return $errorString .= "Go <a href='javascript:history.back()'>back</a> to where you were.";
            }
            else
            {
                return "An error has occured. <p>Error Code #1: {$userTweets->error}</p> Go <a href='javascript:history.back()'>back</a> to where you were.";
            }
        }

        return View::make('user')->with('data', array('tweets' => $userTweets, 'username' => $username));
});

Route::get('search/{username?}', function($username = null)
{
        if(!$username)
        {
            return "The search field was left blank. Go <a href='javascript:history.back()'>back</a> to where you were.";
        }

        $validator = Validator::make(
            array('username' => $username),
            array('username' => array('required', 'min:1', 'max:15', 'Regex:/^([A-Za-z0-9_]*)$/'))
        );

        if ($validator->fails())
        {
            return "Invalid search. Go <a href='javascript:history.back()'>back</a> to where you were.";
        }

        $search = Twitter::getUsersSearch(array("q" => $username));
        //dd($search);

        if(!$search)
        {
            return "The search returned no results. Go <a href='javascript:history.back()'>back</a> to where you were.";
        }

        if(!is_array($search))
        {
            if($search->errors)
            {
                $errorString = null;

                if(count($search->errors) > 1)
                {
                    $errorString .= 'Errors have occured.';
                }
                else
                {
                    $errorString .= 'An error has occured.';
                }

                foreach($search->errors as $tError)
                {
                    $errorString .= "<p>Error Code #{$tError->code}: {$tError->message}</p>";
                }


                return $errorString .= "Go <a href='javascript:history.back()'>back</a> to where you were.";
            }
        }

        return View::make('search')->with('data', array('search' => $search, 'username' => $username));
});
