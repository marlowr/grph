<?php
/**
 * Class Project
 *
 * Project represents a project in the Green River Project Hub
 *
 * The Project class represents a project in the GRPH.  It
 * has a title, description, client, login, password, project status, company location,
 * contact name, contact phone, contact email, IT Class, class quarter, class year, and
 * project ID. It contains functions to add a project, link, and a note into their
 * corresponding database tables.  It also contains a function to return its project ID.
 *
 * @author Ryan Marlow <rmarlow@mail.greenriver.edu>
 * @author Cynthia Pham <cpham15@mail.greenriver.edu
 * @copyright 2018
 */
class Project
{
    protected $title, $description, $client, $login, $password, $status,
        $location, $companyurl, $contactname, $contactemail,
        $contactphone, $instructor, $class, $quarter, $year, $project_id;

    protected $trello = array();
    protected $github = array();
    protected $siteurl = array();
    protected $notes = array();


    /**
     * Project constructor that takes title, description, client, login, password,
     * project status, company location, contact name, contact phone, contact email,
     * IT Class, class quarter, and class year.
     * @param $title Title
     * @param $description Project description
     * @param $client Client name
     * @param $login Login username
     * @param $password Password
     * @param $status Project status
     * @param $location Client location
     * @param $companyurl Company URL
     * @param $contactname Contact Name
     * @param $contactemail Contact Email
     * @param $contactphone Contact Phone
     * @param $instructor Instructor name
     * @param $class Class name
     * @param $quarter Class quarter
     * @param $year Class year
     */
    public function __construct($title, $description, $client, $login, $password, $status, $location, $companyurl, $contactname, $contactemail,
                                $contactphone, $instructor, $class, $quarter, $year)
    {
        $this->title = $title;
        $this->description = $description;
        $this->client = $client;
        $this->login = $login;
        $this->password = $password;
        $this->status = $status;
        $this->location = $location;
        $this->companyurl = $companyurl;
        $this->contactname = $contactname;
        $this->contactemail = $contactemail;
        $this->contactphone = $contactphone;
        $this->instructor = $instructor;
        $this->class = $class;
        $this->quarter = $quarter;
        $this->year = $year;
    }

    /**
     * Inserts project into the projects database table and returns its project ID.
     * @return $project_id Project ID
     */
    public function addProject() {
        global $dbh;

        //Define query
        $sql = "INSERT INTO projects (title, description, client, login, 
                password,status, location, companyurl, contactname, contactemail, contactphone, 
                instructor, class, quarter, years) VALUES (:title,:description,:client,:login,
                :password,:status, :location, :companyurl, :contactname, :contactemail, 
                :contactphone, :instructor, :class, :quarter, :years)";

        //prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':title', $this->title, PDO::PARAM_STR);
        $statement->bindParam(':description', $this->description, PDO::PARAM_STR);
        $statement->bindParam(':client', $this->client, PDO::PARAM_STR);
        $statement->bindParam(':login', $this->login, PDO::PARAM_STR);
        $statement->bindParam(':password', $this->password, PDO::PARAM_STR);
        $statement->bindParam(':status', $this->status, PDO::PARAM_STR);
        $statement->bindParam(':location', $this->location, PDO::PARAM_STR);
        $statement->bindParam(':companyurl', $this->companyurl, PDO::PARAM_STR);
        $statement->bindParam(':contactname', $this->contactname, PDO::PARAM_STR);
        $statement->bindParam(':contactemail', $this->contactemail, PDO::PARAM_STR);
        $statement->bindParam(':contactphone', $this->contactphone, PDO::PARAM_STR);
        $statement->bindParam(':instructor', $this->instructor, PDO::PARAM_STR);
        $statement->bindParam(':class', $this->class, PDO::PARAM_STR);
        $statement->bindParam(':quarter', $this->quarter, PDO::PARAM_STR);
        $statement->bindParam(':years', $this->year, PDO::PARAM_STR);

        //Execute
        $statement->execute();
        $this->project_id = $dbh->lastInsertId();
        return $this->project_id;
    }

    /**
     * Adds a note into the notes database table.  Takes $note as a param where $note
     * is the body content.
     * @param $note Note body content
     */
    public function addNote($note) {
        global $dbh;

        //Define query
        $sql = "INSERT INTO notes(note, project_id) VALUES (:note, :project_id)";

        //prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':note',$note, PDO::PARAM_STR);
        $statement->bindParam(':project_id',$this->project_id, PDO::PARAM_INT);

        //Execute
        $statement->execute();
    }

    /**
     * Returns project id
     * @return $project_id Project ID
     */
    public function getProjectId() {
        return $this->project_id;
    }

    /**
     * Adds a link into the links database table.  Takes $url and $type as params
     * where $url is the url address and $type is the type of the url address
     * @param $type Type of URL (Site, Trello, Github)
     * @param $url URL address
     */
    public function addLink($type, $url) {
        global $dbh;

        //Define query
        $sql = "INSERT INTO links(type, url,project_id) VALUES (:type, :url, :project_id)";

        //prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':type',$type, PDO::PARAM_STR);
        $statement->bindParam(':url',$url, PDO::PARAM_STR);
        $statement->bindParam(':project_id',$this->project_id, PDO::PARAM_INT);

        //Execute
        $statement->execute();
    }
}