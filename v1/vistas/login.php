<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indice</title>
</head>
<body>
    <main>
        <section>
            <h1>Inicia Sesion</h1>
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
                        <input type="text" name="pw" placeholder="Introducir Contraseña">
                    </p>
                    <input type="submit">
                </form>
            </div>
        </section>
    </main>
</body>