<?php
function totalJokes($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM `joke`');
    $row = $query->fetch();
    return $row[0];
}

function getJoke($pdo, $id) {
    // Create the array of $parameters for use in the query function
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM `joke` WHERE `id`= :id', $parameters);
    //print joke to the screen
    return $query->fetch();
}

function query($pdo, $sql, $parameters=[]) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function insertJoke($pdo, $fields) {
    $query = 'INSERT INTO `joke` (';
    foreach ($fields as $key => $value) {
        $query .= '`' . $key / '`,';
    }
    // remove the final comma
    $query = rtrim($query, ',');
    $query .= ') VALUES (';
    // adding :field_name as placeholder for each value
    foreach ($fields as $key => $value) {
        $query .= ':' . $key . ',';
    }
    // remove the final comma
    $query = rtrim($query, ',');
    $query .= ')';
    // insert time
    $fields = processDates($fields);

    query($pdo, $query, $fields);


}


function updateJoke($pdo, $fields) {
    $query = 'UPDATE `joke` SET';
    // loops through data
    foreach ($fields as $key => $value) {
        $query .= '`' . $key . '`= :' . $key . ',';

    }
    $query = rtrim($query, ',');
    $query .=' WHERE `id` = :primaryKey';
    // set date time
    $fields = processDates($fields);
       

    // set premary key variable
    $fields['primaryKey'] = $fields['id'];

    query($pdo, $query, $fields);
}

function deleteJoke($pdo, $id) {
    $parameters = [':id'=>$id];
    query($pdo, 'DELETE FROM `joke`
                WHERE `id` = :id', $parameters);
}

function allJokes($pdo) {
    $jokes = query($pdo, 'SELECT `joke`.`id`, `joketext`,`jokedate`, `name`, `email`
                        FROM `joke` INNER JOIN `author`
                        ON `authorId` = `author`.`id`');
    // fetchAll function returns an array of all records that were retrieved by the query
    return $jokes->fetchAll();
}

function processDates($fields) {
    foreach ($fields as $key => $value) {
        if ($value instanceof DateTime) {
            $fields[$key] = $value->format('Y-m-d');
        }
    }

    return $fields;
}

function allAuthors($pdo) {
    $authors  = query($pdo, 'SELECT * FROM `author`');
    return $authors->fetchAll();
}

function deleteAuthor($pdo, $id) {
    $parameters = [':id' => $id];

    query($pdo, 'DELETE FROM `author` WHERE `id` = :id', $parameters);
}

function insertAuthor($pdo, $fields) {
    $query = 'INSERT INTO `author` (';
    // loop through author attribute
    foreach ($fields as $key => $value) {
        $query .= '`' . $key . '`,';
    }

    $query = rtrim($query, ',');
    $query .= ') VALUES (';
    // loop through values of user
    foreach ($fields as $key => $value) {
        $query .= ':' . $key . ',';
    }
    $query = rtrim($query, ',');
    $query .= ')';
    $fields = processDates($fields);
    query($pdo, $query, $fields);
}

function findAll($pdo, $table, $orderBy=null) {
    if (!isset($orderBy)){
        $result = query($pdo, 'SELECT * FROM `' . $table . '`');
        
    }else {
        $result = query($pdo, 'SELECT * FROM `' . $table . '`'. ' ORDER BY '. $orderBy . ' DESC');
    }
    

    return $result->fetchAll();
}

function delete1($pdo, $table, $primaryKey, $id) {
    $parameter = [':id' => $id];

    query($pdo, 'DELETE FROM `' . $table . '` 
                    WHERE `'. $primaryKey . '` = :id', $parameter);
}

function insert($pdo, $table, $fields) {
    $query = 'INSERT INTO `' . $table . '` (';
    $values = ' VALUES (';

    foreach ($fields as $key => $value) {
        $query .= '`' . $key . '`,';
        $values .= ':' . $key . ',';
    }
    //remove the last comma
    $query = rtrim($query, ',') . ')';
    $values = rtrim($values, ',') . ')';

    $query .= $values;

    $fields = processDates($fields);
    query($pdo, $query, $fields);
}


function update($pdo, $table, $primaryKey, $fields) {
 $query = ' UPDATE `' . $table .'` SET ';
 foreach ($fields as $key => $value) {
 $query .= '`' . $key . '` = :' . $key . ',';
 }
 $query = rtrim($query, ',');
 $query .= ' WHERE `' . $primaryKey . '` = :primaryKey';
 // Set the :primaryKey variable
 $fields['primaryKey'] = $fields['id'];
 $fields = processDates($fields);
 query($pdo, $query, $fields);
}


function findById($pdo, $table, $primaryKey, $value) {
    $query = 'SELECT * FROM `' . $table . '`
                WHERE `' . $primaryKey . '` = :value';
    $parameters = ['value' => $value];
    $query = query($pdo, $query, $parameters);
    return $query->fetch();
}

function total($pdo, $table) {
    $query = query($pdo, 'SELECT COUNT(*) 
    FROM `' . $table . '`');
    $row = $query->fetch();
    return $row[0];
}

// can use for insert and update by just 1 fucntion

function saveAcc($pdo, $table, $primaryKey, $record) {
    if ($record[$primaryKey]) {
        $record[$primaryKey] = null;
    }
    insert($pdo, $table, $record);

}


function signIn($pdo, $username, $password) {
    // Create an associative array with the username
    $parameters = [':username' => $username];
    $query = query($pdo, 'SELECT * FROM `users` WHERE `username`=:username', $parameters);
    // Fetch the result of the query. If a user with the given username exists, 
    // $user will contain their record. Otherwise, it will be false.
    $user = $query->fetch();
    // Check if a user was found and if the given password matches the hashed password stored in the database.
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

    return false;
}



// function save($pdo, $table, $primaryKey, $record) {
//     try {
//         if ($record[$primaryKey]) {
//             $record[$primaryKey] = null;
//         }
//         insert($pdo, $table, $record);
//     }catch (PDOException $e) {
//         update($pdo, $table, $primaryKey, $record);
//     }
// }

function save($pdo, $table, $primaryKey, $record) {
    try {
        if ($record[$primaryKey] == '') {
            insert($pdo, $table, $record);
        } else {
            update($pdo, $table, $primaryKey, $record);
        }
    } catch (PDOException $e) {
        throw $e;
    }
}
    
//     }
  
//   }
// function showUserQuest($questions, $userid) {
//     $userQuest = [];
//      foreach($questions as $question) {
//         echo $questions['userid'];
//         echo $userid;
//         if($question['userid'] == $userid) {
//         $userQuest[] = $question;
//      }
//     }
//     return $userQuest;
// }