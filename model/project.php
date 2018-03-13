<?php
/**
 * Created by PhpStorm.
 * User: mrrya
 * Date: 3/13/2018
 * Time: 3:55 PM
 */

class project
{
    protected $title, $description, $client, $login, $password, $status,
        $notes, $location, $companyurl, $contactname, $contactemail,
        $contactphone, $instructor, $class, $quarter, $years;

    /**
     * project constructor.
     * @param $title
     * @param $description
     * @param $client
     * @param $login
     * @param $password
     * @param $status
     * @param $notes
     * @param $location
     * @param $companyurl
     * @param $contactname
     * @param $contactemail
     * @param $contactphone
     * @param $instructor
     * @param $class
     * @param $quarter
     * @param $years
     */
    public function __construct($title, $description, $client, $login, $password, $status,
                                $notes, $location, $companyurl, $contactname, $contactemail,
                                $contactphone, $instructor, $class, $quarter, $years)
    {
        $this->title = $title;
        $this->description = $description;
        $this->client = $client;
        $this->login = $login;
        $this->password = $password;
        $this->status = $status;
        $this->notes = $notes;
        $this->location = $location;
        $this->companyurl = $companyurl;
        $this->contactname = $contactname;
        $this->contactemail = $contactemail;
        $this->contactphone = $contactphone;
        $this->instructor = $instructor;
        $this->class = $class;
        $this->quarter = $quarter;
        $this->years = $years;
    }
}