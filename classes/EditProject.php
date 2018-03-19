<?php
/**
 * Created by PhpStorm.
 * User: mrrya
 * Date: 3/16/2018
 * Time: 12:16 PM
 */

class EditProject extends Project {
    protected $links;
    protected $savedNotes = array();

    public function __construct($title, $description, $client, $login, $password, $status, $location, $companyurl, $contactname, $contactemail,
                                $contactphone, $instructor, $class, $quarter, $year,$project_id)
    {
        parent::__construct($title, $description, $client, $login, $password, $status, $location, $companyurl, $contactname, $contactemail,
            $contactphone, $instructor, $class, $quarter, $year);
        $this->project_id = $project_id;
    }

    function getNotes() {
        global $dbh;

        $sql =  "SELECT notes.note FROM notes 
                          INNER JOIN projects ON notes.project_id=projects.project_id 
                          WHERE notes.project_id = :project_id";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':project_id',$this->project_id, PDO::PARAM_INT);

        //4. Execute the query
        $statement->execute();

        $this->notes = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($this->notes as $note) {
            array_push($this->savedNotes,$note['note']);
        }
    }

    function getLinks() {
        global $dbh;

        $sql =  "SELECT links.type,links.url FROM links 
                      INNER JOIN projects ON links.project_id=projects.project_id 
                      WHERE links.project_id = :project_id";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':project_id',$this->project_id, PDO::PARAM_INT);

        //4. Execute the query
        $statement->execute();

        $this->links = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($this->links as $link) {
            if($link['type'] == 'siteurl') {
                array_push($this->siteurl, $link['url']);
            } else if($link['type'] == 'trello') {
                array_push($this->trello, $link['url']);
            } else if($link['type'] == 'github') {
                array_push($this->github, $link['url']);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getCompanyurl()
    {
        return $this->companyurl;
    }

    /**
     * @return mixed
     */
    public function getContactname()
    {
        return $this->contactname;
    }

    /**
     * @return mixed
     */
    public function getContactemail()
    {
        return $this->contactemail;
    }

    /**
     * @return mixed
     */
    public function getContactphone()
    {
        return $this->contactphone;
    }

    /**
     * @return mixed
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return mixed
     */
    public function getQuarter()
    {
        return $this->quarter;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    public function getSiteURL() {
        return $this->siteurl;
    }

    public function getTrello() {
        return $this->trello;
    }

    public function getGitHub() {
        return $this->github;
    }

    public function getProjectNotes() {
        return $this->savedNotes;
    }

    /**
     * @return mixed
     */
}