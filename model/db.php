<?php

    //require("/home/cphamgre/config.php");

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

    function addProject($title, $description, $client, $siteurl, $trello,
                        $github, $login, $password, $status, $notes) {
        global $dbh;

        //Define query
        $sql = "INSERT INTO projects (title, description, client, siteurl, trello, github, login, 
            password,status, notes) VALUES (:title,:description,:client,:siteurl,:trello,:github,:login,
            :password,:status,:notes)";

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

    //$row = $statement->fetch(PDO::FETCH_ASSOC);
    //echo $row['name']. " the " . $row['color']." ".$row['type'];


