<?php

// required headers
header("Content-Type: application/json; charset=UTF-8");

 $host = "localhost";
 $db_name = "contacts";
 $username = "asimkon";
 $password = "asimkostas";
 
 $db = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

 $db->exec("SET CHARACTER SET 'utf8'");
 
 $request = json_decode(file_get_contents('php://input'));
 
 $type = $_GET['type'];
 
 $result = null;
 
 if ($type == 'read') {
        // Create SQL SELECT statement
        $statement = $db->prepare('SELECT * FROM  people');

        // Execute the statement
        $statement->execute();

        // The result of the 'read' operation is all products from the product table
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
    }
  
  elseif ($type == 'create') {
        // In batch mode the inserted records are available in the 'models' field
        $createdProducts = $request->models;

        // Will store the ProductID fields of the inserted records
        $result = array();

        foreach($createdProducts as $person) {
            // Create SQL INSERT statement
            $statement = $db->prepare('INSERT INTO people (name,job,employer,email,phone,fax,mobile,address,state) VALUES (:contact_name,:contact_job,:contact_employer,:contact_email,:contact_phone,:contact_fax,:contact_mobile,:contact_address,:contact_state)');

            // Bind parameter values
            
            $statement->bindValue(':contact_name',$person->name);            
			$statement->bindValue(':contact_job',$person->job); 
			$statement->bindValue(':contact_employer',$person->employer);            
			$statement->bindValue(':contact_email',$person->email); 
			$statement->bindValue(':contact_phone',$person->phone);            
			$statement->bindValue(':contact_fax',$person->fax); 
			$statement->bindValue(':contact_mobile',$person->mobile);            
			$statement->bindValue(':contact_address',$person->address);
			$statement->bindValue(':contact_state',$person->state); 
            
            // Execute the statement
            $statement->execute();

            // Set ProductID to the last inserted ID (ProductID is auto-incremented column)
            //$product->id = $db->lastInsertId();

            // The result of the 'create' operation is all inserted products
            $result[] = $person;
        }
           echo json_encode($result);
    } 
    
    elseif ($type == 'update') {
        // in batch mode the updated records are available in the 'models' field
        $updatedProducts = $request->models;

        foreach($updatedProducts as $person) {
            // Create UPDATE SQL statement
            $statement = $db->prepare('UPDATE people SET name=:contact_name,job=:contact_job,employer=:contact_employer,email=:contact_email,phone=:contact_phone,fax=:contact_fax,mobile=:contact_mobile,address=:contact_address,state=:contact_state WHERE id =:contact_id');

            // Bind parameter values
            $statement->bindValue(':contact_id',$person->id);
            $statement->bindValue(':contact_name',$person->name);            
			$statement->bindValue(':contact_job',$person->job); 
			$statement->bindValue(':contact_employer',$person->employer);            
			$statement->bindValue(':contact_email',$person->email); 
			$statement->bindValue(':contact_phone',$person->phone);            
			$statement->bindValue(':contact_fax',$person->fax); 
			$statement->bindValue(':contact_mobile',$person->mobile);            
			$statement->bindValue(':contact_address',$person->address);
			$statement->bindValue(':contact_state',$person->state);
           
            // Execute the statement
            $statement->execute();
        }
    } 

     elseif ($type == 'destroy') {
        // in batch mode the destroyed records are available in the 'models' field
        $destroyedProducts = $request->models;

        foreach($destroyedProducts as $person) {
            // Create DELETE SQL statement
            $statement = $db->prepare('DELETE FROM people WHERE id =:contact_id');

            // Bind parameter values
            $statement->bindValue(':contact_id',$person->id);

            // Execute the statement
            $statement->execute();
        }
    }

?>
