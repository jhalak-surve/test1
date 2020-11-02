<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Login</title>
        <style>
        .border-class{
            border:thin black solid;
            
            padding:20px;
            border-radius:1em;
        }

        button:hover{
            opacity:0.7;
        }

        
        </style>
    
    </head>
    <body>
        
        
            <form method="post" target="_self" style="margin:15%;" class="border-class">
        
                
                <h1 style="text-align:center; margin-bottom:20px">Login</h1>
            
                <div class="form-group row ">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label><br>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" id="user_email" name="uEmail" ><br>
                    </div>
                </div>
                <!--<div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label><br>
                    <div class="col-sm-10">   
                        <input class="form-control" type="text" id="name_of_user" name="uName" required><br>
                    </div>
                </div>-->
                <div class="form-group row"> 
                    <label for="password" class="col-sm-2 col-form-label">Password:</label><br>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" id="user_password" name="uPassword" ><br>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary" style="margin-left:380px" >Log in</button>
                    </div>
                </div>
                
                
                <?php
                    include 'dbconnection.php';
                    if(isset($_POST['submit'])){
                        $uEmail = $_POST['uEmail'];
                        $uPassword = $_POST['uPassword'];
       
                        if(empty($uEmail)){
                            echo "<h6 style='color:red'>Email is required</h6>";
                            header('location: login.php');
                            exit();
                        }else if(empty($uPassword)){
                            echo "<h6 style='color:red'>Password is required</h6>";
                            header('location: login.php');
                            exit();
                        }else{
                            //echo "Valid input";
                            $email_search = "select * from user_details where user_email='$uEmail'";
                            $query = $conn->query($email_search);
                            $email_count = $query->num_rows;
                            if($email_count){
                                $email_pass = $query->fetch_assoc();
                                echo $query->fetch_assoc();
                                $db_pass = $email_pass['user_password'];
                                //$pass_decode = password_verify($uPassword, $db_pass);
                                if($uPassword==$db_pass){
                                    echo "Successfull";
                                    header('location: dashboard.php');
                                    exit();
                                }else{
                                    echo "Password incorrect";
                                }
                            }else{
                                echo "Invalid email";
                            }
                        }
                    }else{
                        //header("Location : login.php");
                        //exit();
                    }
                
                
                ?>
               
                
            </form>
         
            
    </body>
</html>
