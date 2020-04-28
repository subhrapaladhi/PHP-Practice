<?php
    $msg = '';
    $msgClass = '';
    // check for submit
    if(filter_has_var(INPUT_POST, 'submit')){
        // $name       = htmlspecialchars($_POST['name']   ) ;
        $name       = $_POST['name'] ;
        $email      = htmlspecialchars($_POST['email']  ) ;
        $message    = htmlspecialchars($_POST['message']) ;

        // Check required fields
        if(!empty($email) && !empty($name) && !empty($message)){
            // Passed
            // check email
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $msg = 'Please use valid email';
                $msgClass = 'alert-danger';
            }else{
                $toEmail = 'subhrapaladhi9@gmail.com';
                $subject = 'Contact Request from '.$name;
                $body = '<h2>Contact Request</h2>
                        <h4>Name: </h4><p>'.$name.'</p>
                        <h4>Email: </h4><p>'.$email.'</p>
                        <h4>Message: </h4><p>'.$message.'</p>';
                // email header

                $headers = "MIME-VERSION: 1.0"."\r\n";
                $headers.= "Contect-Type:text/html;charset=UTF-8"."\r\n";

                // additional headers
                $headers.="From: ".$name."<".$email.">"."\r\n";

                if(mail($toEmail, $subject, $body, $headers)){
                    // email sent
                    $msg = 'Your email has been sent';
                    $msg = 'alert-success';
                } else {
                    // failed
                    $msg = 'Failed to send email';
                    $msgClass = 'alert-danger';
                }
            }
        } else {
            // Failed
            $msg = 'Please fill in all fields';
            $msgClass = 'alert-danger';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">My Website</a>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container">
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass;?>">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control"
                value="<?php echo isset($_POST['name'])?$name:''; ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control"
                value="<?php echo isset($_POST['email'])?$email:''; ?>">
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <input type="text" name="message" class="form-control"
                value="<?php echo isset($_POST['message'])?$message:''; ?>">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>