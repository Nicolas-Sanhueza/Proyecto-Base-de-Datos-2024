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
        <h2>Maestros del Maratón Anime 🎬✨</h2>
        <p>
            Descubre a los usuarios más dedicados al anime, aquellos que completan sus listas con precisión y 
            eficiencia. ¡Conoce a los verdaderos maestros del completismo!<br></p>
            
            <p><br><b>Esta consulta entrega:</b><br><br>
            
            <b>Username:</b> Nombre del usuario.<br>
            <b>Animes Completados:</b> Total de animes terminados.<br>
            <b>Lista Total de Animes:</b> Cantidad de animes guardados.<br>
            <b>Episodios Vistos:</b> Total de episodios consumidos.<br>
            <b>% de Animes Completados:</b> Proporción de animes finalizados.<br>
            <b>Promedio de Episodios Completados:</b> Episodios promedio por anime terminado.<br><br>
            
            <b>Personaliza tu Consulta:</b><br><br>
            
            <b>Top de usuarios:</b> Elige cuántos mostrar (Top 5, 10, etc.).<br>
            <b>Mínimo de animes en lista:</b> Filtra por cantidad mínima.<br>
            <b>Mínimo de animes completados:</b> Define los requisitos para destacar en el ranking.<br><br>
            ¡El título de Maestro del Maratón Anime está en tus manos! 🏆</p>

            <div class="consulta-sql">
                <pre>
            SELECT 
                "Username",
                "Completed",
                "Total Entries",
                "Episodes Watched",
                ("Completed"::float / "Total Entries") * 100 AS "Completion_Percentage",
                ("Episodes Watched"::float / "Completed") AS "Avg_Episodes_Per_Completed"
            FROM 
                users_details
            WHERE 
                "Total Entries" > $total_entries
                AND "Completed" > $completed
                AND "Episodes Watched" > $episodes_watched
            ORDER BY 
                "Completion_Percentage" DESC,
                "Completed" DESC
            LIMIT $limit;
                </pre>
            </div>      
        
        <!-- Formulario para ingresar los datos de la consulta -->
        <div class="formulario container"> 
            <form action="resultados3.php" method="post">
                <div class="input-group">

                    <div class="input-container">
                        <input type="text" id="limit" name="limit" placeholder="Cantidad de usuarios a mostrar" required>
                        <i class="fas fa-users"></i>
                    </div>

                    <div class="input-container">
                        <input type="text" id="total_entries" name="total_entries" placeholder="Mínimo de Animes en la lista" required>
                        <i class="fas fa-list"></i>
                    </div>

                    <div class="input-container">
                        <input type="text" id="completed" name="completed" placeholder="Mínimo de episodios completados" required>
                        <i class="fas fa-check"></i>
                    </div>

                    <div class="input-container">
                        <input type="text" id="episodes_watched" name="episodes_watched" placeholder="Mínimo de Episodios completados" required>
                        <i class="fas fa-tv"></i>
                    </div>

                    <button type="submit" class="btn">Enviar Consulta</button>

                </div>
            </form>
        </div>    
    </section>

    <main class="resultados container">
        <h2>Resultados de la Consulta 3</h2>

        <?php
        include("Administra_consultas.php");

        if (isset($_POST['limit'], $_POST['total_entries'], $_POST['completed'], $_POST['episodes_watched']) && 
            !empty($_POST['limit']) && !empty($_POST['total_entries']) && !empty($_POST['completed']) && !empty($_POST['episodes_watched'])) {
            $limit = pg_escape_string($conn, $_POST['limit']); 
            $total_entries = pg_escape_string($conn, $_POST['total_entries']);
            $completed = pg_escape_string($conn, $_POST['completed']);
            $episodes_watched = pg_escape_string($conn, $_POST['episodes_watched']);
            $query = "SELECT 
                            \"Username\",
                            \"Completed\",
                            \"Total Entries\",
                            \"Episodes Watched\",
                            (\"Completed\"::float / \"Total Entries\") * 100 AS \"Completion_Percentage\",
                            (\"Episodes Watched\"::float / \"Completed\") AS \"Avg_Episodes_Per_Completed\"
                        FROM users_details
                        WHERE 
                            \"Total Entries\" > $total_entries
                            AND \"Completed\" > $completed
                            AND \"Episodes Watched\" > $episodes_watched
                        ORDER BY 
                            \"Completion_Percentage\" DESC, 
                            \"Completed\" DESC
                        LIMIT $limit;";
            $resultados = ejecutarConsulta($query);

            if ($resultados) {
                echo "<table border='1'>";
                echo "<tr><th>Nombre de usuario</th>
                          <th>Animes completados</th>
                          <th>Animes en Lista</th>
                          <th>Episodios vistos</th>
                          <th>Porcentaje de completados</th>
                          <th>Promedio de capítulos por anime</th>
                      </tr>";
                foreach ($resultados as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Completed']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Total Entries']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Episodes Watched']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Completion_Percentage']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Avg_Episodes_Per_Completed']) . "</td>";
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