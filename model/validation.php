<?php

    $linkArray = array("http://", "https://", "www.", "http://www.", "https://www.");
    $trelloArray = array("http://trello.com/", "https://trello.com/", "www.trello.com/",
        "http://www.trello.com/", "trello.com/", "https://www.trello/");
    $githubArray = array("http://github.com/", "https://github.com/", "www.github.com/",
        "http:www//github.com/", "github.com/", "https://www.github.com/");

    /**
     * @param $link
     * @return mixed|string
     */
    function trimLink($link) {

        global $linkArray;
        $link = strtolower($link);
        $link = trim($link);

        foreach($linkArray as $val)
        {
            if (stripos($link, $val) !== FALSE)
            {
                $link = str_replace($val, "", $link);
            }

        }

        $link = "https://www." . $link;
        return $link;
    }

    /**
     * @param $trello
     * @return mixed|string
     */
    function trimTrello($trello) {

        global $trelloArray;
        $trello = strtolower($trello);
        $trello = trim($trello);

        foreach($trelloArray as $val)
        {
            if (stripos($trello, $val) !== FALSE)
            {
                $trello = str_replace($val, "", $trello);
            }
        }

        $trello = "https://www.trello.com/" . $trello;
        return $trello;
    }

    /**
     * @param $github
     * @return mixed|string
     */
    function trimGitHub($github) {

        global $githubArray;
        $github = strtolower($github);
        $github = trim($github);

        foreach($githubArray as $val)
        {
            if (stripos($github, $val) !== FALSE)
            {
                $github = str_replace($val, "", $github);
            }
        }

        $github = "https://www.github.com/" . $github;
        return $github;
    }


    //PHP Validation

    /**
     * @param $title
     * @return string
     */
    function validateTitle($title) {
        if($title != null)
        {
            return "Project title is required";
        }
    }

    /**
     * @param $client
     * @return string
     */
    function validateClient($client)
    {
        if ($client != null) {
            return "Client's name is required";
        }
        else if (!ctype_alpha($client))
        {
            return "Client's name needs to only be alphabetical.";
        }
    }

    /**
     * @param $description
     * @return string
     */
    function validateDesc($description) {

        if($description != null)
        {
            return "Project description is required.";
        }
        else if (strlen($description) >= 10)
        {
            return "Project description needs to be at least 10 characters long.";
        }
    }

    //Javascript Regex Validation

    /**
     * Validates client's phone number
     *
     * Validates to see if phone number is 10 digits long.  Accepts the following format:
     * xxxxxxxxxx, xxx-xxx-xxxx, (xxx)xxx-xxxx, (xxx)xxxxxxx.  If it doesn't match, it will
     * print error message
     * @param $contactPhone Client's phone number
     * @return String error message that reads "invalid phone number format"
     *
     */
    function validatePhone($contactPhone) {
        $regexp = '/^\(?\d{3}\)?-?\d{3}-?\d{4}$/';

        if (!preg_match($regexp, $contactPhone))
        {
            return "Invalid phone number format.";
        }
    }

    /**
     * Validates email address (case-insensitive)
     *
     * Validates to see if email starts with a letter and then any digits or letters repeated 0 or more times.
     * Has @ character then any word group followed by . character between one or two times.  Must end in edu
     * or com.  If it doesn't match, it will print error message
     *
     * @param $email Email Address
     * @return String error message that reads "invalid email address"
     */
    function validateEmail($contactEmail) {
        $regexp = '/^[a-z][a-z0-9]*@\w+\.(\w*.)?(com|edu)$/i';

        if (!preg_match($regexp, $contactEmail))
        {
            return "Invalid email address.";
        }
    }