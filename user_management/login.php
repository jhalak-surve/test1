<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Login</title>
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
        
        
            <form method="post" " target="_self" style="margin:15%;" class="border-class">
        
            
                <h1 style="text-align:center; margin-bottom:20px">Login</h1>
            
                <div class="form-group row ">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label><br>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" id="user_email" name="email" required><br>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label><br>
                    <div class="col-sm-10">   
                        <input class="form-control" type="text" id="name_of_user" name="userName" required><br>
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="password" class="col-sm-2 col-form-label">Password:</label><br>
                    <div class="col-sm-10">
                        <input type="password" id="user_password" name="user_password" required><br>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" >Log in</button>
                    </div>
                </div>
            
            </form>
         
        
        
        <?php 
    
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db_name = "user";


            $conn = mysqli_connect($servername, $username, $password, $db_name);


            if (!$conn) {
                die("Connection failed: ".mysqli_connect_error()); 
            }
    
            /*$sql = "INSERT INTO user_details ( user_email, name_of_user, user_password )
            VALUES ( '$_POST[user_email]', '$_POST[name_of_user]', '$_POST[user_password]' )";
            if (!$conn->query($sql)){
                die('Error: ' . $conn->error);
            }*/

            if(isset($_POST[$email]) && isset($_POST[$userName]) && isset($_POST[$user_password])){
                $userEmail = $_POST[$email];
                $userName = $_POST[$name];
                $userPassword = $_POST[$user_password];

                $sql = "select * from user_details where user_email = $userEmail AND user_password = $userPassword limit 1";
                $result = query($sql);
                if ($result->num_rows == 1){
                    echo "Successfully logged in";
                }else{
                    echo "Error";
                }
            }

            //echo "1 record added";
    
            
    
            $conn->close();
        ?>
        
    
    </body>
    

    


</html>