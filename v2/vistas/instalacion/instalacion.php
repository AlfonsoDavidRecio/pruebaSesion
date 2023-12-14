<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalacion</title> 
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4; /* Fondo gris claro, ajusta según tus preferencias */
        }

        main {
            text-align: center;
        }

        section {
            margin-top: 20px; /* Ajusta el margen según sea necesario */
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff; /* Color de texto blanco, ajusta según tus preferencias */
            background-color: #3498db; /* Color de fondo azul, ajusta según tus preferencias */
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
            <a href="index.php?control=Instalacion_Con&metodo=procesoInstalacion"">Instalacion</a>
            <br/>
            <a href="index.php?control=sesion_con">Iniciar Sesion</a>
            <?php echo "<p style='color: red; text-align: center;'>".$mensaje."</p>" ?>
        </section>
    </main>
</body>