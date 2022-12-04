<?php
 include '_connect.php';
?>



<html>
    <head>
        <link rel="stylesheet" href="login/css/login.css">
        <title>Login</title>
    </head>
    <body class="flex-column">
        
            <div class="card">
            <div class="title">
                <h1>Login</h1>
            </div>
            
            <form method="post" action=''>
                <input type="text" class="cut-corner" placeholder="username" name="username" hint="TEST">
                    
                    
                    <input type="password" class="cut-corner" placeholder="password" name="password">
                <input type="submit" class="submit-button" value="Login">
            </form>
        </div>
        
    </body>
</html>


<?php
    if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
        $usern = $_REQUEST['username'];
        $passw = $_REQUEST['password'];

        $salt = getSalt($usern);

        $url = $link . $site . "login?email=" . $usern . "&password=" . hash('sha512', $passw . $salt . '7w!z%C*F');

        $json = file_get_contents($url);
        $json = json_decode($json);
        $res = $json->result;
        
        if($res == 0){
            echo "Successful";
            $_SESSION['username']=$usern;
            $_SESSION['loggedin']=true;
            header('location: dashboard.php');
        }elseif ($res == 1) {
            echo "You do not have authority to access this website";
        }elseif ($res == 2) {
            echo "Your password is wrong";
        }

    }
    
?>