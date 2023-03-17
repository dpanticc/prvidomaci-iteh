
<?php

require "dbBroker.php";
require "model/reprezentacija.php";
session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
  header("Location: index.php");
  die();
}

$result = Reprezentacija::getAll($conn);
if (!$result) {
  echo "Greska kod upita<br>";
  die();
}
if ($result->num_rows == 0) {
  echo "Nema timova";
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>
</head>
<body>
<table id = "tabela">
  <thead>
    <tr>
      <th>Team</th>
      <th>Group</th>
      <th>Wins</th>
      <th>Draws</th>
      <th>Losses</th>
      <th>Points</th>
    </tr>
  </thead>
  <tbody>
  <?php
      while ($red = $result->fetch_array()) {
  ?>
        <tr>
          <td><?php echo $red["team"] ?></td>
          <td><?php echo $red["group"] ?></td>
          <td><?php echo $red["wins"] ?></td>
          <td><?php echo $red["draws"] ?></td>
          <td><?php echo $red["losses"] ?></td>
          <td><?php echo $red["points"] ?></td>
          <td>
              <label class="custom-radio-btn">
                <input type="radio" name="checked-donut" value=<?php echo $red["teamID"] ?>>
                <span class="checkmark"></span>
              </label>
           </td>
         
        </tr>
    <?php
     
    }
    
    ?>
  </tbody>
  <tfoot>
   <tr>
    
   <td colspan="6" align="center" id="footer">
      <button type="button" id="addButton" class="tableButtons" data-toggle="modal" data-target="#myModal">Add team</button>
      <button type="button" id="openEditModal" class="tableButtons">Edit</button>
      <button id="deleteButton" formmethod="post" class="tableButtons">Delete team</button>
        
    </td>
   </tr>
</tfoot>
</table>


<div class="modal fade" id="myModal" style="display: none" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
    
                <div class="modal-body">
                    <div class="container prijava-form">
                        <form action="#" method="post" id="dodajForm">
                            <h3 style="color: black; text-align: center">Add team</h3>
                            
                                <div class="col-md-11 ">
                                    <div class="form-group">
                                        <label for="">Team</label>
                                        <input type="text" style="border: 1px solid black" name="team" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Group</label>
                                        <input type="text" style="border: 1px solid black" name="group" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Wins</label>
                                        <input type="text" style="border: 1px solid black" name="wins" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Draws</label>
                                        <input type="text" style="border: 1px solid black" name="draws" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Losses</label>
                                        <input type="text" style="border: 1px solid black" name="losses" class="form-control" />
                                    </div>
                                     
                                    <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block">Add team</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                </div>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="izmeniModal" style="display: none" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
    
                <div class="modal-body">
                    <div class="container prijava-form">
                        <form action="#" method="post" id="izmeniForm">
                            <h3 style="color: black; text-align: center">Edit team</h3>
                            <input type="hidden" name="teamID" value="" />
                                <div class="col-md-11 ">
                                    <div class="form-group">
                                    <label for="">Team</label>
                                        <input type="text" style="border: 1px solid black" 
                                        name="team" class="form-control"value="" />
                                    </div>
                                    <div class="form-group">
                                    <label for="">Group</label>
                                        <input type="text" style="border: 1px solid black" 
                                        name="group" class="form-control" value = "" />
                                    </div>
                                    <div class="form-group">
                                    <label for="">Wins</label>
                                        <input type="text" style="border: 1px solid black" 
                                        name="wins" class="form-control" value=""/>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Draws</label>
                                        <input type="text" style="border: 1px solid black" 
                                        name="draws" class="form-control" value=""/>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Losses</label>
                                        <input type="text" style="border: 1px solid black" 
                                        name="losses" class="form-control" value=""/>
                                    </div>

                                    <div class="form-group">
                                        <button id="btnIzmeni" type="submit" class="btn btn-success btn-block">Edit team</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                </div>
                                </div>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-jm+hk57lEqsrgj8tY2VX9Fue5nS1Mna03A5C7VeiVOcOMuI7EiLuLJY4ID6X9xRypce7ZUvOV8Ei3gD3wdbItw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="js\script.js"></script>

</body>
</html>