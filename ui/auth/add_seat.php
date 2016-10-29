 <?php
ob_start();
require_once("resource/Database.php"); //db connection ?>
<?php require_once("resource/utilities.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
<?php $page_title = "ORRS"; ?>
<?php require_once("patches/header.php"); ?>
<?php require_once("patches/addtrainlogic.php"); ?>
 <?php if(!isset($_SESSION['username'])): ?>
<div class="container">
    <div class="flag">
        <h1>O R R S</h1>
    <p> You are currently not sign in as ADMIN <br/>
    <a href="adminlogin.php">Login here
    </p>
    </div>
</div>

<?php else: ?>
<div>
       </div>
<?php    
$id = getstationid($db);
$nm = getstationname($db);
?> 
 <form method="post">
 <div class="row">
<div class="col-xs-3">
                        <label for="ex1">Train no</label>
                        <input placeholder="50" name="tno" class="form-control" id="ex1" type="number"> </div>
</div>
                


 <div class="row">
                <div class="col-md-6">
                
                    <div class="col-xs-6">
                        <label for="ex1">No of seats in SL</label>
                        <input placeholder="50" name="sl" class="form-control" id="ex1" type="number"> </div>
                </div>
                <div class="col-md-6">
                    <div class="col-xs-6 form-group">
                        <label for="ex2">No of seats in 3AC</label><br/> 
                        <input placeholder="50" name="ac3" class="form-control" id="ex1" type="number"> </div>

                        
                        </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                    <div class="col-xs-6">
                        <label for="ex1">No of seats in 2AC</label>
                        <input placeholder="50" name="ac2" class="form-control" id="ex1" type="number"> </div>
                </div>
                <div class="col-md-6">
                    <div class="col-xs-6 form-group">
                        <label for="ex2">No of seats in 1AC</label><br/> 
                        <input placeholder="50" name="ac1" class="form-control" id="ex1" type="number"> </div>

                        
                        </div>
                </div>
            </div>

            <input type="submit" name="submit" class="btn btn-info" value="Add Train To Database"> </center><br/>
</form>

<?php
    $form_errors = array();
    if(isset($_POST['submit'])){
            // if empty, process data
    try{
        $sqlInsert =  "INSERT INTO trainseat (train_no, thirdtier, secondtier, firsttier, sl) ";
        $sqlInsert .= "VALUES (:tno, :3ac, :2ac, :1ac, :sl )";

        $statement = $db->prepare($sqlInsert);
        $statement->execute(array(':tno' => $_POST['tno'], ':3ac' => $_POST['ac3'], ':2ac' => $_POST['ac2'], ':1ac' => $_POST['ac1'], ':sl' => $_POST['sl']));
                     if($statement -> rowCount() == 1){
                         echo "thank you";
                //$result = flashMessage("Registration succesful" ,"pass");
                }
            }catch (PDOException $ex){
                    $result = flashMessage("Error occured : " . $ex->getMessage() );
            }
    }

?>









            

<?php endif ?>

<?php require_once("patches/footer.php"); ?>