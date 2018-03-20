<?php
/**
 * validation.php holds the codes for both (PHP/JavaScript) validation.
 *
 * Validates site URL, trello, github links to its proper format.
 * @author Ryan Marlow <rmarlow@mail.greenriver.edu>
 * @author Cynthia Pham <cpham15@mail.greenriver.edu>
 * @copyright 2018
 * @version 1.0
 */
    $linkArray = array("http://", "https://", "www.", "http://www.", "https://www.");
    $trelloArray = array("http://trello.com/", "https://trello.com/", "www.trello.com/",
        "http://www.trello.com/", "trello.com/", "https://www.trello/");
    $githubArray = array("http://github.com/", "https://github.com/", "www.github.com/",
        "http:www//github.com/", "github.com/", "https://www.github.com/");

    /**
     * Validates site URL according to format. Changes URL to proper
     * "https://www./" format
     * @param $siteurl Site URL link
     * @return String $siteurl Site URL in proper format
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
     * Validates trello according to format. Changes URL to proper
     * "https://www.trello.com/" format
     * @param $trello Trello link
     * @return String $trello Trello URL in proper format
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
     * Validates github according to format. Changes URL to proper
     * "https://www.github.com/" format
     * @param $github Github link
     * @return String $github Github URL in proper format
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
     * Validates project's title
     *
     * Validates to see if project's title is not null. If not, it will print error message.
     * @param $title Project's title
     * @return String error message that reads "Project title is required"
     */
    function validateTitle($title) {
        if($title != null)
        {
            return "Project title is required";
        }
    }

    /**
     * Validates project client's name
     *
     * Validates to see if client's name is not null. Accepts alphabetical letters only.
     * If it doesn't validate, it will print error message.
     * @param $client Project client's name
     * @return String error message that reads "Client's name needs to only be alphabetical."
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
     * Validates project description
     *
     * Validates to see if description is not null.  Accepts descriptions whose
     * string length is longer than 10 characters.  If it doesn't validate, it will
     * print error message
     * @param $description Project's description
     * @return String error message that reads "Project description needs to be at least 10 characters long."
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