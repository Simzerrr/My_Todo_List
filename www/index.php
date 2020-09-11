<!DOCTYPE html>
<html>
<title>My_Todo_List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="design.css">
<body>

<?php include 'function.php';?>
<div class="row">
      <div class="col" id=col>
        <ul class="w3-ul w3-border">
          <li><h2>Tâches à faire</h2></li>
          <?php 
          
            $res = recup_a_faire();
            if($res->num_rows>0){
              while($row = $res->fetch_assoc()){
                echo '<li class="w3-display-container">'.$row["Name"].'
                <span onclick="this.parentElement.style.display="none"" class="w3-button w3-display-right">&times;</span>
                </li>';
              }
            }
          ?>
        </ul>
      </div>
      <div class="col" id="col1">
        <ul class="w3-ul w3-border">
          <li><h2>Tâches finies</h2></li>
          <?php 
            $req = NULL;
            $res = recup_faite();
            if($res->num_rows>0){
              while($row = $res->fetch_assoc()){
                echo '<li class="w3-display-container">'.$row["Name"].'
                <span onclick="this.parentElement.style.display="none"" class="w3-button w3-display-right">&times;</span>
                </li>';
              }
            }
          ?>
        </ul>
      </div>
</div>
<form action="function.php" method="post">
<div class="row1">
  <h2>Ajouter une tâche :</h2>
  <input type=text name="add" id="add" >
  <input class="button1" id="but1"type=submit >
</div>

<div class="row3">
<h2>Tâche terminée:</h2>

<select name="terminé" >
            <option value=""></option>
    <?php 
          
            $res = recup_a_faire();
            if($res->num_rows>0){
              while($row = $res->fetch_assoc()){
                echo '<option value="'.$row["Name"].'">'.$row["Name"].'</option>';
                
              }
            }
          ?>
      <input class="button1" type=submit id="but1" >
</select>
</div>

<div class="row2">
<h2>Supprimer une tâche:</h2>

<select name="sup" >
            <option value=""></option>
    <?php 
          
            $res = recup_a_faire();
            if($res->num_rows>0){
              while($row = $res->fetch_assoc()){
                echo '<option value="'.$row["Name"].'">'.$row["Name"].'</option>';
                
              }
            }
            $res = recup_faite();
            if($res->num_rows>0){
              while($row = $res->fetch_assoc()){
                echo '<option value="'.$row["Name"].'">'.$row["Name"].'</option>';
                
              }
            }
          ?>
      <input class="button1" type=submit >
</select>
</div>
</form>





</body>
</html> 