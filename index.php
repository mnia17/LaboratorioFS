<!--@author Alessandra-Marie Bayot Diana 
IDE: Visual Studio Code 1.79.0 -->

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title> Formulario de registro de usuario </title>
    <link href="styles.css" rel ="stylesheet" type="text/css">
    <script type="text/javascript" src="index.js"></script>
</head>
<body>
    <div class="group">
        <form method="POST" action=" " id="formulario">
        <fieldset>
        <h2><em> Formulario de Registro </em></h2>
        <!--Nombre -->
        <div>
            <label for="nombre" >Nombre <span><em>(requerido)</em></span><br></label>
            <input type="text" name="nombre" class="form-input" id="nombre" pattern="[A-Za-z]{1,25}" required/>
            <div class="formulario_input_error"></div><br>
        </div>

        <!--Apellidos-->
        <div>
            <label for="primer_apellido">Primer Apellido <span><em>(requerido)</em></span><br></label>
            <input type="text" name="primer_apellido" class="form-input" id="p_apellido" pattern="[A-Za-z]{1,25}" required/>
            <div class="formulario_input_error"></div><br>
        </div>

        <div>
            <label for="segundo_apellido"> Segundo Apellido <span><em>(requerido)</em></span><br></label>
            <input type="text" name="segundo_apellido" class="form-input" id="s_apellido" pattern="[A-Za-z]{1,25}" required/>
            <div class="formulario_input_error"></div><br>
        </div>

        <!--Email -->
        <div>
            <label for="email" required >Email <span><em>(requerido)</em></span><br></label>
            <input type="email" name="email" class="form-input" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$" required/>
            <div class="formulario_input_error"></div><br>
        </div>

        <!--Usuario -->
        <!--Se solicitará un usuario que empiece y acabe por una letra, que tenga al menos una mayúsucula y una minúscula, un dígito, de 4-8 caracteres de longitud -->
        <div>
            <label for="usuario" >Usuario <span><em>(requerido)</em></span><br></label>
            <input type="text" name="usuario" class="form-input" id="usuario" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$" required/>
            <div class="formulario_input_error"></div><br>
        </div>

        <!--Contraseñas-->
        <!--Se solicitará una contraseña que empiece con una letra, y acabe por una letra, con una letra mayúscula y otra minúscula,un dígito,un carácter especial sin espacios de 4-8 carácteres-->
        <div>
            <label for="pass" >Contraseña: <span><em>(requerido)</em></span><br></label>
            <input type="password" name="pass" class="form-input" id="pass1" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$" required/>
            <div class="formulario_input_error"></div><br>

        </div>

        <!--Botón Submit-->
        <!--<input class="form-btn" name="submit" type="submit" value="Suscribirse"/> -->
        <button type="submit" class="pulse" name="subscribirse">Subscribirse</button> 
        <!--Botón Reset-->
        <button type="reset" class="raise">Reset</button>
        <!--Botón Información-->
        <button type="button" class="btn_ayuda" onclick="mostrarInfo()"><img src="images/ayuda.png" height ="30" width="30" /></button>
        

        </fieldset>

        <!--código PHP-->
        <?php
        if($_POST){
        /**
         * Si el usuario ha introducido datos se produce las acciones dentro del if
         * En nuestro caso hemos indicado de igual manera que se deben rellenar las casillas
         */
        //Instanciamos las variables con los datos introducidos por el usuario
        $nombre = $_POST['nombre'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $contra = $_POST['pass'];

        /**
         * Conexión con PDO
         * Guardamos los parámetros de la conexión en variables
         */

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "laboratorio";

        //Create connection
        $conn = new mysqli($servername,$username,$password,$dbname);
        //Check connection
        if($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }

        /**
         * Guardamos en una variable la consulta sql para introducir los datos en la BBDD
        * En mi caso la tabla a la que se van a insertar los datos se llama usuario en la base de datos llamada cursossql
        */
        //consulta para guardar los usuarios
        $sql = "INSERT INTO `usuarios` (`nombre`, `primer_apellido`, `segundo_apellido`, `email`, `usuario`, `password`) VALUES ('$nombre','$primer_apellido','$segundo_apellido','$email','$usuario','$contra')";
        //consulta para saber si un usuario se encuentra registrado, con un filtraje de email y usuario
        $consultausuario = "SELECT `nombre`, `primer_apellido`, `segundo_apellido`, `email`, `usuario` FROM `usuarios` WHERE email='$email' and usuario='$usuario'";
        //Guardamos en una variable la consulta, para contar si nos devuelve filas con la consultausuario
        $result = mysqli_num_rows(mysqli_query($conn,$consultausuario));
        //Dentro de un if-else ejecutamos la consulta guardada en las variables anteriores
        if($result === 0){
            //en el caso de que no encuentre, podemos introducir al usuario 
            if($conn->query($sql) === TRUE){
                echo '<script language="javascript">alert("La inscripción se ha realizado correctamente");</script>';
            }else{
                echo "Error: ". $sql . "<br>" .$conn->error;
            }
                
        }else{
            //Si encuentra un dato 
            echo '<script language="javascript">alert("ERROR \n La persona ya está registrada en nuestra base de datos");</script>';
            
        }
  
        //Cerramos la conexión
        $conn->close();
        }
        ?>
        </form>
        
    </div>
    <div>
        <!--Botón Consulta -->
        <a href="mostrarconsulta.php" class="pulse" name="btnConsulta">Consulta de usuarios</a>
    </div>
</body>
</html>
