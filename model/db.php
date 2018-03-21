<?php
/**
 * This file contains all the database information and logic for the Green River Project Hub
 * IT 328 Final Project - Green River Project Hub
 * index.php
 *
 * @package classes
 * @authors Ryan Marlow<rmarlow@mail.greenriver.edu> / Cynthia Pham <cpham15@mail.greenriver.edu>
 * @version 1.0
 *
 */
    function connect()
    {
        try {
            //Instantiate a database object
            $dbh = new PDO(GRPH_DSN, GRPH_USERNAME,
                GRPH_PASSWORD );
            return $dbh;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

/**
 * Returns the project information from the database based on the title provided.
 * @param $title
 * @return mixed project object array
 */
    function getProject($title) {

        global $dbh;

        $sql = "SELECT * FROM projects WHERE title = :title";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':title', $title, PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        //5. Get the results
        $project = $statement->fetch(PDO::FETCH_ASSOC);

        //6. Return student
        return $project;
    }

/**
 * @return array of all projects in database
 */
    function getProjects() {

        global $dbh;

        $sql = "SELECT * FROM projects";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //4. Execute the query
        $statement->execute();

        //5. Get the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

/**
 * Removes project from database based on project_id provided.
 * @param $project_id
 */
    function removeProject($project_id) {
        global $dbh;

        $sql = "DELETE FROM projects WHERE project_id = :project_id;
                DELETE FROM links WHERE project_id = :project_id;
                DELETE FROM notes WHERE project_id = :project_id;";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':project_id', $project_id, PDO::PARAM_INT);

        //4. Execute the query
        $statement->execute();
    }

/**
 * Removes url from database based on unique url provided.
 * @param $url
 */
function removeLink($url) {
    global $dbh;

    $sql = "DELETE FROM links WHERE url = :url";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters
    $statement->bindParam(':url', $url, PDO::PARAM_INT);

    //4. Execute the query
    $statement->execute();
}

/**
 * Removes note from database based on unique note provided.
 * @param $note
 */
function removeNote($note) {
    global $dbh;

    $sql = "DELETE FROM notes WHERE note = :note";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters
    $statement->bindParam(':note', $note, PDO::PARAM_INT);

    //4. Execute the query
    $statement->execute();
}

/**
 * Updates project information in database based on the title.
 * @param $title
 * @param $description
 * @param $client
 * @param $contactname
 * @param $location
 * @param $contactemail
 * @param $contactphone
 * @param $companyurl
 * @param $login
 * @param $password
 * @param $status
 * @param $class
 * @param $instructor
 * @param $quarter
 * @param $year
 */
    function updateProject($title, $description, $client, $contactname, $location, $contactemail, $contactphone,
                           $companyurl, $login, $password, $status, $class, $instructor, $quarter, $year) {
        global $dbh;
        //Define query
        $sql = "UPDATE projects
                    SET title=:title,description=:description,client=:client, login=:login,password=:password,
                    status=:status, location=:location, contactname=:contactname, contactemail=:contactemail,
                    contactphone=:contactphone, companyurl=:companyurl, class=:class, instructor=:instructor,
                    quarter=:quarter, years=:years WHERE title=:title";
        //prepare the statement
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':client', $client, PDO::PARAM_STR);
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->bindParam(':location', $location, PDO::PARAM_STR);
        $statement->bindParam(':companyurl', $companyurl, PDO::PARAM_STR);
        $statement->bindParam(':contactname', $contactname, PDO::PARAM_STR);
        $statement->bindParam(':contactemail', $contactemail, PDO::PARAM_STR);
        $statement->bindParam(':contactphone', $contactphone, PDO::PARAM_STR);
        $statement->bindParam(':instructor', $instructor, PDO::PARAM_STR);
        $statement->bindParam(':class', $class, PDO::PARAM_STR);
        $statement->bindParam(':quarter', $quarter, PDO::PARAM_STR);
        $statement->bindParam(':years', $year, PDO::PARAM_STR);

        //Execute
        $statement->execute();
    }

/**
 * Returns project id given from the title specified.
 * @param $title
 * @return mixed
 */
    function getProjectLinkId($title) {
        global $dbh;

        $sql = "SELECT project_id FROM projects WHERE title = :title";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':title', $title, PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        $project = $statement->fetch();

        return $project['project_id'];

    }

/**
 * @param $project_id
 * @return array returns all links based on project_id number
 */
    function getLinks($project_id) {
        global $dbh;

        $sql =  "SELECT links.type,links.url FROM links 
                      INNER JOIN projects ON links.project_id=projects.project_id 
                      WHERE links.project_id = :project_id";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':project_id',$project_id, PDO::PARAM_INT);

        //4. Execute the query
        $statement->execute();

        $links = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $links;
    }


/**
 * Adds a note to the database, using specified note and project_id number.
 * @param $note
 * @param $project_id
 * @return string
 */
    function addNote($note,$project_id) {
        global $dbh;

        //Define query
        $sql = "INSERT INTO notes(note, project_id) VALUES (:note, :project_id)";

        //prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':note',$note, PDO::PARAM_STR);
        $statement->bindParam(':project_id',$project_id, PDO::PARAM_INT);

        //Execute
        $statement->execute();
        $id = $dbh->lastInsertId();
        return $id;
    }

/**
 * Returns all notes linked to the project_id number provided.
 * @param $project_id
 * @return array
 */
    function getNotes($project_id) {
        global $dbh;

        $sql =  "SELECT notes.note FROM notes 
                          INNER JOIN projects ON notes.project_id=projects.project_id 
                          WHERE notes.project_id = :project_id";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':project_id',$project_id, PDO::PARAM_INT);

        //4. Execute the query
        $statement->execute();

        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    }

/**
 * Adds link to database based on project_id number.
 * @param $type
 * @param $url
 * @param $project_id
 * @return string
 */
    function addLink($type, $url, $project_id) {
        global $dbh;

        //Define query
        $sql = "INSERT INTO links(type, url,project_id) VALUES (:type, :url, :project_id)";

        //prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':type',$type, PDO::PARAM_STR);
        $statement->bindParam(':url',$url, PDO::PARAM_STR);
        $statement->bindParam(':project_id',$project_id, PDO::PARAM_INT);

        //Execute
        $statement->execute();
        $id = $dbh->lastInsertId();
        return $id;
    }




