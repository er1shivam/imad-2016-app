<?php
    $form_errors = array();
    if(isset($_POST['searchtno'])){

        $required_fields = array('train_no');
        //check empty fields and merge the error msg
        $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
         if(empty($form_errors)) {
            // if empty, process data
    try{
        $sqlInsert =  "SELECT * FROM trains_info WHERE train_no = :tno";
        $statement = $db->prepare($sqlInsert);
        $statement->execute(array(':tno' => $_POST['train_no']));

                if($statement -> rowCount() == 1){
                   print_r($sqlInsert);
                //$result = flashMessage("Registration succesful" ,"pass");
                }
            }catch (PDOException $ex){
                    $result = flashMessage("Error occured : " . $ex->getMessage() );
            }
    }
    else{
        if(count($form_errors) == 1){
             $result  = flashMessage("There was one error in the form <br/>");
        }
        else{
        $result  = flashMessage("There were " . count($form_errors). " errors in the form <br />");
        }
    }
}

?>