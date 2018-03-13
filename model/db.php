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
                        $notes, $location, $companyurl, $contactname, $contactemail,
                        $contactphone, $instructor, $class, $quarter, $years)
    {
        global $dbh;

        //Define query
        $sql = "INSERT INTO projects (title, description, client, login, 
                password,status, notes, location, companyurl, contactname, contactemail, contactphone, 
                instructor, class, quarter, years) VALUES (:title,:description,:client,:login,
                :password,:status,:notes, :location, :companyurl, :contactname, :contactemail, 
                :contactphone, :instructor, :class, :quarter, :years)";

        //prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':client', $client, PDO::PARAM_STR);
        $statement->bindParam(':login', $login, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);
        $statement->bindParam(':notes', $notes, PDO::PARAM_STR);
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

        $sql = "SELECT projects.*, GROUP_CONCAT(links.url SEPARATOR ', ') as url
                    FROM projects
                    LEFT JOIN ProjectLink ON ProjectLink.project_id = projects.project_id
                    LEFT JOIN links ON ProjectLink.link_id = links.link_id
                    GROUP BY projects.project_id";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //4. Execute the query
        $statement->execute();

        //5. Get the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }


    function removeProject($title) {
        global $dbh;

        $sql = "DELETE FROM projects WHERE title = :title LIMIT 1";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':title', $title, PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();
    }

    function updateProject($title, $description, $client, $siteurl, $trello,
                        $github, $login, $password, $status, $notes) {
        global $dbh;

        //Define query
        $sql = "UPDATE projects
                SET title=:title,
                    description=:description,
                    client=:client,
                    siteurl=:siteurl,
                    trello=:trello,
                    github=:github,
                    login=:login,
                    password=:password,
                    status=:status,
                    notes=:notes
                     WHERE title=:title";

        //prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':title',$title, PDO::PARAM_STR);
        $statement->bindParam(':description',$description, PDO::PARAM_STR);
        $statement->bindParam(':client',$client, PDO::PARAM_STR);
        $statement->bindParam(':siteurl',$siteurl, PDO::PARAM_STR);
        $statement->bindParam(':trello',$trello, PDO::PARAM_STR);
        $statement->bindParam(':github',$github, PDO::PARAM_STR);
        $statement->bindParam(':login',$login, PDO::PARAM_STR);
        $statement->bindParam(':password',$password, PDO::PARAM_STR);
        $statement->bindParam(':status',$status,PDO::PARAM_STR);
        $statement->bindParam(':notes',$notes, PDO::PARAM_STR);

        //Execute
        $statement->execute();

    }

    function getNumOfLinks($url) {
        global $dbh;

        $sql = "SELECT * FROM links WHERE url = :url";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':url', $url, PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        $count = $statement->rowCount();

        return $count;
    }

    function addLink($type, $url) {
        global $dbh;

        //Define query
        $sql = "INSERT INTO links(type, url) VALUES (:type, :url)";

        //prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':type',$type, PDO::PARAM_STR);
        $statement->bindParam(':url',$url, PDO::PARAM_STR);

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

    function addProjectLink($project_id, $link_id) {
        global $dbh;

        //Define query
        $sql = "INSERT INTO ProjectLink(project_id, link_id) VALUES (:project_id, :link_id)";

        //prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':project_id',$project_id, PDO::PARAM_INT);
        $statement->bindParam(':link_id',$link_id, PDO::PARAM_INT);

        //Execute
        $statement->execute();
    }





