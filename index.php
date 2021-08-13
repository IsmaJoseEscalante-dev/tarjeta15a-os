<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $message = $email = $status = $phone = "";
$name_err = $message_err = $email_err = $status_err =  $phone_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Por favor ingrese el nombre completo.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Por favor ingrese el nombre completo valido.";
    } else {
        $name = $input_name;
    }

    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if (empty($input_phone)) {
        $phone_err = "Por favor ingrese el número de celular.";
    } elseif (!ctype_digit($input_phone)) {
        $phone_err = "Por favor ingrese números[0-9] para el celular.";
    } else {
        $phone = $input_phone;
    }
    //validate status
    $input_status = trim($_POST["status"]);
    if (empty($input_status)) {
        $status_err = "Por favor confirme su asistencia o ausencia.";
    } else {
        $status = $input_status == "No" ? 'No' : 'Si';
    }
    //validate message
    $input_message = trim($_POST["message"]);
    $message = $input_message;

    //validate email
    $input_email = trim($_POST["email"]);
    $email = $input_email;


    // Check input errors before inserting in database
    if (empty($name_err) && empty($phone_err) && empty($status_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO invitados (name,email,status, message, phone) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_email, $param_status, $param_message, $param_phone);

            // Set parameters
            $param_name = $name;
            $param_message = $message;
            $param_phone = $phone;
            $param_status = $status;
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: confirm.php");
                exit();
            } else {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis 15 años - Ludmila Jezabel Viedma</title>
    <meta name="apple-mobile-web-app-title" content="Mis 15 años Ludmila Jezabel Viedma">
    <!-- icono del titulo -->
    <link rel="shortcut icon" href="https://cdn.sstatic.net/Sites/es/img/favicon.ico?v=a8def514be8a">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,100;0,300;0,400;0,700;1,100&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <!--  <link rel="stylesheet" href="css/normalize.css"> -->
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div id="contenedor_carga">
        <div class="loading" id="loading">
            <span class="load"></span>
            <span class="load"></span>
            <span class="load"></span>
            <span class="load"></span>
        </div>
    </div>

    <section class="content-imgs">
        <div class="set">
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
        </div>
        <div class="set set2">
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
        </div>
        <div class="set set3">
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
            <div><img src="imagenes/hoja3.png" alt="" width="100px"></div>
        </div>
    </section>
    <div class="full-contenido">
        <div class="contenedor">
            <main class="contenido-principal">
                <div class="contenido-principal__contenedor">
                    <h1 class="title-beautify">¡ Mis 15 Años !</h1>
                    <h2 class="subtitle text-white"> 6 de Noviembre de 2021</h2>
                    <div id="escritura" class="text-glow"></div>
                    <a href="#informacion" class="rainbow-button" alt="Button"><b> VER INFORMACIÓN</b> </a>
                </div>
            </main>
            <section class="contenedor-informacion" id="informacion">
                <div class="text-uppercase subtitle pb-4">
                    CUENTA&nbsp;REGRESIVA
                    <hr class="mt-2">
                </div>
                <div class="row container">
                    <div class="col-12">
                        <div class="count" id="cuenta"></div>
                    </div>
                </div>
            </section>
            <section class="container-fluid contenedor-informacion">
                <div class="text-uppercase subtitle pb-4">
                    LUGARES&nbsp;DE&nbsp;LA&nbsp;FIESTA
                    <hr class="mt-2">
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 col-lg-3 mb-4 mb-md-0">
                        <div class="card shadow">
                            <div class="card-body pt-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="text-center title-parrafo">Misa</h3>
                                    <div class="content-icon my-3">
                                        <i class="fas fa-church custom-icon"></i>
                                    </div>
                                </div>
                                <img src="imagenes/misa.jpeg" class="img-cards" id="yourImgId" alt="alt tags are key!" />
                                <p class="text-justify title-parrafo">
                                    Con la bendición de Dios y de mis padres celebraremos la misa de acción de gracias el día 7 de agosto en la parroquia del Inmaculado Corazón de María a las 8 pm.
                                </p>
                                <a href="https://goo.gl/maps/1QEuetjuQ9kakU2t8" class="boton-1">Cómo llegar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-3">
                        <div class="card shadow">
                            <div class="card-body pt-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content-icon my-3">
                                        <i class="fas fa-glass-cheers custom-icon"></i>
                                    </div>
                                    <h3 class="text-center title-parrafo">Fiesta</h3>
                                </div>
                                <img src="imagenes/fiesta1.jpeg" class="img-cards" id="yourImgId" alt="alt tags are key!" />
                                <p class="text-justify title-parrafo">
                                    El día mágico donde seré la protagonista de ésta celebración será el 6 de noviembre en el Conticello Salón de Fiestas a las 10 pm. Nos encantaria que nos acompañes.
                                </p>
                                <a href="https://goo.gl/maps/BBARTyLhfzumv17K6" class="boton-1">Como llegar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="contenedor-formulario">
                <div class="text-uppercase subtitle pb-4 text-center">
                    marca&nbsp;tu&nbsp;asistencia
                    <hr class="mt-2">
                </div>
                <div class="row justify-content-center container-fluid">
                    <div class="floating-component col-md-6 bg-white shadow px-5 pt-5  pb-3 position-relative">
                        <div class="cabecera"></div>
                        <div style="color:#999999">
                            Por favor confirma tu asistencia con anticipación y prepará tu <b>vestimenta de gala</b>.
                            <hr class="mt-2">
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="formulario">
                            <div class="d-flex">
                                <div class="floating-form-group pr-3 w-100">
                                    <input class="floating-form-control" type="text" name=" name" id="name" placeholder=" " value="<?php echo $name; ?>">
                                    <span class="invalid-feedback d-block"><?php echo $name_err; ?></span>
                                    <span class="highlight"></span>
                                    <label class="label-form">Nombre</label>
                                </div>
                                <div class="floating-form-group w-100">
                                    <input class="floating-form-control" type="text" name="phone" placeholder=" " id="phone" value="<?php echo $phone; ?>" onKeyPress="return soloNumeros(event)">
                                    <span class="invalid-feedback d-block"><?php echo $phone_err; ?></span>
                                    <span class="highlight"></span>
                                    <label class="label-form">Telefono</label>
                                </div>
                            </div>
                            <div class="floating-form-group">
                                <input class="floating-form-control" type="email" name="email" placeholder=" " id="email" value="<?php echo $email; ?>">
                                <span class="invalid-feedback d-block"><?php echo $email_err; ?></span>
                                <span class="highlight"></span>
                                <label class="label-form">Email (<i>opcional</i>)</label>
                            </div>
                            <div class="floating-form-group">
                                <textarea class="floating-form-control floating-textarea" name="message" id="message" rows="7" placeholder=" "><?php echo $message; ?></textarea>
                                <span class="highlight"></span>
                                <span class="invalid-feedback d-block"><?php echo $message_err; ?></span>
                                <label class="label-form">Dejanos un mensaje (<i>opcional</i>)</label>
                            </div>
                            <label class="content-radio">Si, asistire a la mejor fiesta del año
                                <input type="radio" id="status1" name="status" value="Si">
                                <span class="checkmark"></span>
                            </label>
                            <label class="content-radio">No podre lo lamento
                                <input type="radio" id="status2" name="status" value="No">
                                <span class="checkmark"></span>
                            </label>
                            <span class="invalid-feedback d-block"><?php echo $status_err; ?></span>
                            <button type="submit" class="boton-1 mt-2  mx-auto d-block">Confirmar</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer class="container-fluid">
        <div class="text-uppercase subtitle pb-4">
            CONTACTANOS
            <hr class="mt-2">
        </div>
        <div class="rounded-social-buttons">
            <a class="social-button facebook" href="https://www.facebook.com/gisella.zottola" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a class="social-button whatsapp" href="https://api.whatsapp.com/send?phone=5493814498629&text=Hola, voy al 15 de ludmi! Nombre/s y apellido/s del/los invitado/s:" target="_blank"><i class="fab fa-whatsapp"></i></i></a>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/simplyCountdown.min.js "></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="js/app.js "></script>
    <script src="js/main.js"></script>

</body>

</html>