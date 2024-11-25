<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Consulta 1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="consulta.css">
</head>
<body>

    <header class="header">
        <div class="menu container">
            <a href="index.php" class="logo">Anime 2024 <i class="fas fa-search"></i></a>
            <nav class="navbar">
                <ul>
                    <li><a href="index.php">Principal</a></li>
                    <li><a href="consulta1.php">Consulta 1</a></li>
                    <li><a href="consulta2.php">Consulta 2</a></li>
                    <li><a href="consulta3.php">Consulta 3</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Contenido de la Consulta -->
    <section class="consulta container">
        <h2>¡Lideres en Producción!🎬</h2>
        <p> 
        ¡Prepárate para descubrir a los lideres de la animación! Esta consulta explora el 
        mundo de los estudios de anime y muestra aquellos que han creado X cantidad, ¡tú decides 
        el número así que el poder está en tus manos! Pero no solo esto, sino que esta consulta 
        también relaciona calidad con cantidad y calcula el promedio de la puntuación de cada una de 
        sus creaciones. ¿Quiénes serán los reyes de la calidad en la creación de animes?</p>

        <p><br><b>Esta consulta entrega:</b><br><br>
            
        <b>Estudio:</b> Nombre del estudio desarrollador.<br>
        <b>Cantidad de animes producidos:</b> Número de obras creadas por el estudio desarrollador.<br>
        <b>Puntuación promedio de sus creaciones:</b> Score alcanzado por las obras creadas por el estudio.<br><br>
        
        <b>Personaliza tu Consulta:</b><br><br>
        
        <b>Cantidad de producciones:</b> Elige la cota mínima en terminos de cantidad de animes producidos por la desarrolladora (50, 100, 200, etc.).<br><br>

        ¡Tú decides la cantidad de animes desarrollados! 🔝</p>

        <div class="consulta-sql">
            <pre>
        SELECT 
            t1."Studios",
            COUNT(t1.anime_id) AS "Num_Animes",
            AVG((t1."Score" + t2."Score") / 2) AS "Avg_Score"
        FROM 
            anime_dataset_2023 t1
        INNER JOIN 
            anime_filtered t2 ON t1.anime_id = t2.anime_id
        GROUP BY 
            t1."Studios"
        HAVING 
            COUNT(t1.anime_id) > $variable
        ORDER BY 
            "Avg_Score" DESC;
            </pre>
        </div>
        
        <!-- Formulario para ingresar los datos de la consulta -->
        <div class="formulario container"> 
            <form action="resultados2.php" method="post">
                <div class="input-group">

                    <div class="input-container">
                        <input type="text" id="cantidad" name="cantidad" placeholder="Mínima cantidad de animes producidos" required>
                        <i class="fas fa-cog"></i>
                    </div>

                    <button type="submit" class="btn">Enviar Consulta</button>

                </div>
            </form>
        </div>    
    </section>

    <main class="resultados container">
        <h2>Resultados de la Consulta 2</h2>

        <?php
        include("Administra_consultas.php");

        if (isset($_POST['cantidad']) && !empty($_POST['cantidad'])) {
            $cantidad = pg_escape_string($conn, $_POST['cantidad']); // Evitar inyección SQL
            $query = "SELECT 
                            t1.\"Studios\",
                            COUNT(t1.anime_id) AS \"Num_Animes\",
                            AVG((t1.\"Score\" + t2.\"Score\") / 2) AS \"Avg_Score\"
                        FROM anime_dataset_2023 t1
                        INNER JOIN anime_filtered t2 ON t1.anime_id = t2.anime_id
                        GROUP BY t1.\"Studios\"
                        HAVING COUNT(t1.anime_id) > $cantidad
                        ORDER BY \"Avg_Score\" DESC;";
            $resultados = ejecutarConsulta($query);

            if ($resultados) {
                echo "<table border='1'>";
                echo "<tr><th>Estudio</th><th>Cantidad de animes producidos</th><th>Puntuación promedio de sus creaciones</th></tr>";
                foreach ($resultados as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Studios']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Num_Animes']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Avg_Score']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No se encontraron resultados para la búsqueda.</p>";
            }
        } else {
            echo "<p>Por favor, ingresa un término de búsqueda.</p>";
        }

        cerrarConexion();
        ?>

    </main>

    <footer class="footer">
        <div class="footer-content container">
            <div class="link">
                <a href="index.php" class="logo">Anime 2024</a>
            </div>    
            <div class="link">
                <ul>
                    <li><a href="index.php">Principal</a></li>
                    <li><a href="consulta1.php">Consulta 1</a></li>
                    <li><a href="consulta2.php">Consulta 2</a></li>
                    <li><a href="consulta3.php">Consulta 3</a></li>
                </ul>
            </div>
        </div>    
    </footer>

</body>
</html>