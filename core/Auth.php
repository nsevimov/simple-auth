<?php
namespace app\core;

class Auth {
    private $conn;

    public function signUp() 
    {
        if(isset($_POST['register']))
        {
            //Instance of PDO connection
            $this->conn = new Database();

            $username = trim(htmlspecialchars($_POST['username']));
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            $confirmPassword = trim(htmlspecialchars($_POST['confirmPassword']));
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            
            //Statement for username lookup
            $usernameQuery = "SELECT * FROM users WHERE username=?";
            $usernameChecking = $this->conn->connection()->prepare($usernameQuery);
            $usernameChecking->execute([$username]);

            //Statement for email lookup
            $emailQuery = "SELECT * FROM users WHERE email=?";
            $emailChecking = $this->conn->connection()->prepare($emailQuery);
            $emailChecking->execute([$email]);

            //Checking provided username is exists in DB or not
            if($usernameChecking->rowCount() > 0) 
            {
                echo '
                <div class="alert alert-danger" role="alert">
                That username is already in use!
                </div>
                ';
            }
            
            //Checking provided email is exists in DB or not
            if($emailChecking->rowCount() > 0) 
            {
                echo '
                <div class="alert alert-danger" role="alert">
                That email is already in use!
                </div>
                ';
            }

            if($password !== $confirmPassword)
            {
                echo '
                <div class="alert alert-danger" role="alert">
                Passwords must match to proceed.
                </div> 
                ';
            }

            if(strlen($password) < 5) 
            {
                echo '
                <div class="alert alert-danger" role="alert">
                Password must be more than 5 characters.
                </div>
                ';
            }

            //Inserting credentials into database
            if(!empty($username && $password && $email && $password === $confirmPassword && $emailChecking->rowCount() < 1 && $usernameChecking->rowCount() < 1 && strlen($password) > 5))
            {
                $signUpQuery = "INSERT INTO users(username,email,password) VALUES (?,?,?)";
                $statement = $this->conn->connection()->prepare($signUpQuery);
                $statement->execute([$username,$email,$hashPassword]);

                echo '
                <div class="alert alert-success" role="alert">
                You have successfully registered!
                </div>

                <div class="alert alert-primary" role="alert">
                <a href="signin.php" title="Sign In">Go to Sign In</a>
                </div>
                ';
            }
            

        }
    }

    public function signIn() 
    {
        if(isset($_POST['login']))
        {
            $this->conn = new Database();
            $username = trim(htmlspecialchars($_POST['username']));
            $password = trim(htmlspecialchars($_POST['password']));
            $signInQuery = "SELECT * FROM users WHERE username=?";
            $statement = $this->conn->connection()->prepare($signInQuery);
            $statement->execute([$username]);
            foreach($statement->fetchAll() as $user);

            if($statement->rowCount() < 1) {
                echo '
                <div class="alert alert-danger" role="alert">
                Username does not exist
                </div>
                ';
            }

            if($statement->rowCount() > 0 && password_verify($password, $user['password']))
            {
                $_SESSION['uid'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
            }
            else {
                echo '
                <div class="alert alert-danger" role="alert">
                Password is incorrect.
                </div>
                ';
            }
        }
    }

    public function logout() 
    {
        session_start();
        $_SESSION['uid'] = NULL;
        $_SESSION['username'] = NULL;
        session_destroy();
        header("Location: signin.php");
    }
}