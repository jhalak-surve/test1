<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Add User</title>
        <style>
        .border-class{
            border:thin black solid;
            margin:20px;
            padding:20px;
            border-radius:1em;
        }
        </style>
    
    </head>
    <body>
        
        
            <form method="post" action="added.php" target="_self" style="margin:15%;" class="border-class">
        
            
                <h1 style="text-align:center; margin-bottom:20px">Add User</h1>
            
                <div class="form-group row ">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label><br>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" id="ruser_email" name="remail" required><br>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label><br>
                    <div class="col-sm-10">   
                        <input class="form-control" type="text" id="name_of_user" name="rname" required><br>
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="password" class="col-sm-2 col-form-label">Password:</label><br>
                    <div class="col-sm-10">
                        <input type="password" id="user_password" name="ruser_password" required><br>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"  >Add</button>
                    </div>
                </div>
            
            </form>
            
            
            <?php
                $conn = mysqli_connect("localhost", "root", "", "user");
                if(!$conn){
                    die("Connection failed: ".mysqli_connect_error());
                }
                $r_email = $POST["remail"];
                $r_name = $POST["rname"];
                $r_pass = $POST["ruser_password"];
               // if(isset($_POST[remail]$_POST[rname]', '$_POST[ruser_password]))
                $sql = "insert into user_details (user_email, name_of_user, user_password) values('$r_email', '$r_name', '$r_pass' )";
                if (!$conn->query($sql)){
                    die('Error: ' . $conn->error);
                }
                
            ?>
            
            
            
         </body>
    </html>
        
        