<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta 1 - Base de Datos Anime 2024</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="consulta.css">
</head>
<body>

    <!-- Encabezado -->
    <header class="header">
        <div class="menu container">
            <a href="index.php" class="logo">Anime 2024 <i class="fas fa-search"></i></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="menu"/>   
            </label>

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
    <main class="consulta container">
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
                        <input type="text" id="completed" name="completed" placeholder="Mínimo de Animes completados" required>
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
    </main>

    <!-- Pie de página -->
    <footer class="footer">
        <div class="footer-content container">
            <div class="link">
                <a href="index.php" class="logo">Anime 2024 <i class="fas fa-search"></i></a>
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
