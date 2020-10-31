<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Dashboard</title>
        <style>
            header {
                text-align: right; 
                 
                background-color: black;
                color:white; 
                
            }
        
        </style>
    </head>
    <body>
        <?php
            session_start(); 
            if(isset($_POST['userName']) && isset($_POST['user_password'])){
                $_SESSION['name'] = $_POST['userName'];
                $_SESSION['pass'] = $_POST['user_password'];
            }
            //$_SESSION['name'] = $_POST['userName'];
            //echo "<h3>Hello ". $_POST['name']."</h1><br><br>";
        
        ?>
        <!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <?php $_POST['name']?>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Log out</a>
        
            </div>
            </li>
        </ul>
        </nav>-->
        <header>
            <?php 
                if(isset($_POST['userName'])){
                    echo "". $_POST['userName']."<br>";
                }
            ?>
            
        </header>
        <button type="button" class="btn btn-info" style="margin:20px; float:right" onclick=add()>Add</button>
        <script>
            function add()
            {
                location.href = "add-user.php";
            } 
        </script>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "user");
                if(!$conn){
                    die("Connection failed: ".mysqli_connect_error());
                }
                $sql = "select user_id, user_email, name_of_user from user_details ";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr><th scope='row'>".$row["user_id"]."</th><td>".$row["user_email"]."</td><td>".$row["name_of_user"]."</td><td><button type='button' class='btn btn-primary'>Edit</button>&nbsp<button type='button' class='btn btn-danger'>Delete</button></td><td></td></tr>";
                        
                
                    }
                    echo "</tbody></table>";
                }
            
            ?>
            

    </body>


</html>