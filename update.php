<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $message = $email = $status = $phone = "";
$name_err = $message_err = $email_err = $status_err =  $phone_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
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
        // Prepare an update statement
        $sql = "UPDATE invitados SET name=?, email=?, status=?, message=?, phone=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssi", $param_name, $param_email, $param_status, $param_message, $param_phone, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_message = $message;
            $param_phone = $phone;
            $param_email = $email;
            $param_status = $status;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM invitados WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $message = $row["message"];
                    $phone = $row["phone"];
                    $email = $row["email"];
                    $status = $row["status"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Editar datos invitado</h2>
                    <p>Por favor llene los campos para editar los registros</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                            <label>Mensaje</label>
                            <textarea name="message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="custom-control custom-checkbox mb-2">
                          <input type="checkbox" class="custom-control-input" name="status" id="formCheck" value="<?php echo $status; ?>" <?php if($status=="Si") echo " checked "?>>
                          <label class="custom-control-label" for="formCheck">Asistiré</label>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                      <input type="submit" class="btn btn-primary" value="Actualizar">
                      <a href="invitados.php" class="btn btn-secondary ml-2">Cancelar</a>
                  </form>
              </div>
          </div>        
      </div>
  </div>
</body>
</html>