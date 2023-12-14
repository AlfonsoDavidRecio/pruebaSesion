<?php session_start(); //Inicio de sesion ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center; /* Añadido para centrar el contenido */
        }

        main {
            margin: 50px auto;
            border-radius: 5px;
        }

        section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            margin: 0 auto; /* Añadido para centrar el section horizontalmente */
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            color: #555;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        p {
            text-align: left;
            width: 100%;
            margin-bottom: 15px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff; /* Color de texto blanco, ajusta según tus preferencias */
            background-color: #4caf50; /* Color de fondo azul, ajusta según tus preferencias */
            border-radius: 5px; /* Bordes redondeados */
            transition: background-color 0.3s; /* Transición suave del color de fondo */
            margin-top: 5px;
        }

        a:hover {
            background-color: #2980b9; /* Color de fondo azul más oscuro al pasar el ratón */
        }
    </style>
</head>
<body>
    <main>
        <section>
            <div>
                <p>
                    <?php
                        //Existe datos en $_SESSION
                        if(isset($_SESSION['nombre'])) {
                            echo '<p>'.$_SESSION['nombre'].' En esta página podras registrar a los admins para los minijuegos</p>';
                        } else {
                            //Si no hay datos en $_SESSION muestra mensaje
                            echo "No se encontraron datos de sesión.";
                        }
                    ?>
                </p>
            </div>
        </section>
        <section>
            <h1>Registrar Admin Minijuegos</h1>
            <hr>
            <div>
                <form action="index.php?control=sesion_con&metodo=register" method="POST">
                    <p>
                        <label for="Introducir Nombre">Nombre</label>
                        <br/>
                        <input type="text" name="nombre" placeholder="Introducir Nombre">
                    </p>
                    <p>
                        <label for="Correo Electronico">Correo</label>
                        <br/>
                        <input type="text" name="correo" placeholder="Correo Electronico">
                    </p>
                    <p>
                        <label for="Introducir Contraseña">Contraseña</label>
                        <br/>
                        <input type="text" name="pw" placeholder="Introducir Contraseña">
                    </p>
                    <input type="submit">
                </form>
            </div>
            <a href="index.php?control=sesion_con&metodo=cerrarSesion">Cerrar Sesion</a>
            <?php echo "<p style='color: red; text-align: center;'>".$mensaje."</p>" ?>
        </section>
    </main>
</body>