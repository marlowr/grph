<?php
/**
 * Created by PhpStorm.
 * User: mrrya
 * Date: 3/13/2018
 * Time: 3:55 PM
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
     * @param $year
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

    public function getProjectId() {
        return $this->project_id;
    }

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