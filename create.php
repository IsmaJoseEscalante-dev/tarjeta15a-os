<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $message = $email = $status = $phone = "";
$name_err = $message_err = $email_err = $status_err =  $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Por favor introduzca un nombre.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Por favor introduzca un nombre válido.";
    } else{
        $name = $input_name;
    }

    //validate message
    $input_message = trim($_POST["message"]);
    $message = $input_message;

    //validate email
    $input_email = trim($_POST["email"]);
    $email = $input_email;

    
    
    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Por favor introduzca un telefono";     
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Por favor introduzca un telefono válido.";
    } else{
        $phone = $input_phone;
    }
    //validate status
    $input_status = trim($_POST["status"]);
    $status = $input_status == null ? 'No' : 'Si';
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($message_err) && empty($phone_err) && empty($email_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO invitados (name,email,status, message, phone) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name ,$param_email, $param_status, $param_message, $param_phone);
            
            // Set parameters
            $param_name = $name;
            $param_message = $message;
            $param_phone = $phone;
            $param_status = $status;
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: invitados.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrar nuevo invitado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Registrar nuevo invitado</h2>
                    <p>Por favor llene los campos para registrar al invitado.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                              <input type="checkbox" class="custom-control-input" name="status" id="formCheck">
                              <label class="custom-control-label" for="formCheck">Asistiré</label>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                        <a href="invitados.php" class="btn btn-secondary ml-2">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>