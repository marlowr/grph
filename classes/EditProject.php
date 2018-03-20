<?php
/**
 * Class EditProject
 *
 * EditProject represents an edited project in the Green River Project Hub
 *
 * The EditProject class represents an edited project with the same fields as a Project.  It
 * has a title, description, client, login, password, project status, company location,
 * contact name, contact phone, contact email, IT Class, class quarter, class year.  It
 * extends from Project where it also contains links and notes.  This class contains getter
 * functions
 *
 * @author Ryan Marlow <rmarlow@mail.greenriver.edu>
 * @author Cynthia Pham <cpham15@mail.greenriver.edu
 * @copyright 2018
 */
class EditProject extends Project {
    protected $links;
    protected $savedNotes = array();

    /**
     * EditProject constructor that takes title, description, client, login, password,
     * project status, company location, contact name, contact phone, contact email,
     * IT Class, class quarter, class year, and project id.  Uses parent Project constructor
     * to construct object.
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
     * @param $project_id Project ID
     */
    public function __construct($title, $description, $client, $login, $password, $status, $location, $companyurl, $contactname, $contactemail,
                                $contactphone, $instructor, $class, $quarter, $year,$project_id)
    {
        parent::__construct($title, $description, $client, $login, $password, $status, $location, $companyurl, $contactname, $contactemail,
            $contactphone, $instructor, $class, $quarter, $year);
        $this->project_id = $project_id;
    }

    /**
     * Selects note content from notes database table where note's project id belongs
     * to a specific project
     *
     */
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

    /**
     * Selects links from links database table where link's project id belongs
     * to a specific project
     *
     */
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
     * Returns project title
     * @return $title Project title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns project description
     * @return $description Project description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns project client
     * @return $client Project client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Returns login username
     * @return $login Login username
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Retruns login password
     * @return $password Password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns project status
     * @return $status Project status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns client location
     * @return $location Client location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Returns company URL
     * @return $companyurl Company URL
     */
    public function getCompanyurl()
    {
        return $this->companyurl;
    }

    /**
     * Returns contact name
     * @return $contactname Contact name
     */
    public function getContactname()
    {
        return $this->contactname;
    }

    /**
     * Returns contact email
     * @return $contactemail Contact email
     */
    public function getContactemail()
    {
        return $this->contactemail;
    }

    /**
     * Returns contact phone
     * @return $contactphone Contact phone
     */
    public function getContactphone()
    {
        return $this->contactphone;
    }

    /**
     * Returns instructor name
     * @return $instructor Instructor name
     */
    public function getInstructor()
    {
        return $this->instructor;
    }

    /**
     * Returns class name
     * @return $class Class name
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Returns class quarter
     * @return $quarter Class quarter
     */
    public function getQuarter()
    {
        return $this->quarter;
    }

    /**
     * Returns class year
     * @return $year Class year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Returns an array of site URLs
     * @return array $siteurl Array of site URLs
     */
    public function getSiteURL() {
        return $this->siteurl;
    }

    /**
     * Returns an array of Trello URLs
     * @return array $trello Array of trello URLS
     */
    public function getTrello() {
        return $this->trello;
    }

    /**
     * Returns an array of GitHub URLs
     * @return array $github Array of GitHub URLS
     */
    public function getGitHub() {
        return $this->github;
    }

    /**
     * Returns an array of saved notes
     * @return array $savedNotes Array of notes
     */
    public function getProjectNotes() {
        return $this->savedNotes;
    }
}