<?php

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

    function addProject($title, $description, $client, $login, $password, $status,
                        $location, $companyurl, $contactname, $contactemail,
                        $contactphone, $instructor, $class, $quarter, $years) {
        global $dbh;

        //Define query
        $sql = "INSERT INTO projects (title, description, client, login, 
                password,status, location, companyurl, contactname, contactemail, contactphone, 
                instructor, class, quarter, years) VALUES (:title,:description,:client,:login,
                :password,:status, :location, :companyurl, :contactname, :contactemail, 
                :contactphone, :instructor, :class, :quarter, :years)";

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
        $statement->bindParam(':years', $years, PDO::PARAM_STR);

        //Execute
        $statement->execute();
        $id = $dbh->lastInsertId();
        return $id;

    }

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

    function removeProject($project_id) {
        global $dbh;

        $sql = "DELETE FROM projects WHERE project_id = :project_id;
                DELETE FROM links WHERE project_id = :project_id;";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':project_id', $project_id, PDO::PARAM_INT);

        //4. Execute the query
        $statement->execute();
    }

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

    function updateNote($note_id, $note) {
        global $dbh;
        //Define query
        $sql = "UPDATE notes SET note=:note WHERE note_id=:note_id";
        //prepare the statement
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':note', $note, PDO::PARAM_STR);
        $statement->bindParam(':note_id', $note_id, PDO::PARAM_INT);

        //Execute
        $statement->execute();
    }

    function getNoteId($note) {
        global $dbh;

        $sql = "SELECT note_id FROM notes WHERE note = :note";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':note', $note, PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        $note = $statement->fetch();

        return $note['note_id'];
    }

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

    function getLinkId($url) {
        global $dbh;

        $sql = "SELECT link_id FROM links WHERE url = :url";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':url', $url, PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        $link = $statement->fetch();

        return $link['link_id'];
    }

    function updateLink($link_id, $url) {
        global $dbh;
        //Define query
        $sql = "UPDATE links SET url=:url WHERE link_id=:link_id";
        //prepare the statement
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':url', $url, PDO::PARAM_STR);
        $statement->bindParam(':link_id', $link_id, PDO::PARAM_INT);

        //Execute
        $statement->execute();
    }





