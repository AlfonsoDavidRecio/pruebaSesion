<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        main {
            text-align: center;
        }

        section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        h1 {
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

        p {
            text-align: left;
            width: 100%;
            margin-bottom: 15px;
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

        input[type="checkbox"] {
            width: auto;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <main>
        <section>
            <h1>Inicia Sesion</h1>
            <hr>
            <div>
                <form action="index.php?control=sesion_con&metodo=iniciar" method="POST">
                    <p>
                        <label for="Introducir Nombre">Nombre</label>
                        <br/>
                        <input type="text" name="nombre" placeholder="Introducir Nombre">
                    </p>
                    <p>
                        <label for="Introducir Contraseña">Contraseña</label>
                        <br/>
                        <input type="text" name="pw" placeholder="Introducir Contraseña" id="contra">
                        <input type="checkbox" id="mostrarContra"><label>Mostrar contraseña</label>
                    </p>
                    <input type="submit">
                    <?php echo "<p style='color: red; text-align: center;'>".$mensaje."</p>" ?>
                </form>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const contraInput = document.getElementById('contra');
                    const mostrarContraCheckbox = document.getElementById('mostrarContra');

                    // Configurar el tipo de input por defecto
                    contraInput.type = 'password';

                    mostrarContraCheckbox.addEventListener('change', function () {
                        contraInput.type = mostrarContraCheckbox.checked ? 'text' : 'password';
                    });
                });
            </script>
        </section>
    </main>
</body>