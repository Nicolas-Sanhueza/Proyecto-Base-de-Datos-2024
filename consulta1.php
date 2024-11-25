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
        <h2>¡Ranking de Animes Más Populares!</h2>
        <p>
        ¡Sumérgete en el fascinante universo de los animes más aclamados! 
        Esta consulta revela cuántos animes lideran en popularidad según 
        la suma de sus seguidores combinados entre dos tablas, ¡tú decides 
        hasta dónde llegar en esta lista de éxitos! Además, no se trata solo 
        de cantidad, sino también de calidad: se calcula el promedio de la puntuación 
        que cada uno de estos animes ha obtenido. ¿Cuáles serán las joyas que dominan el mundo del anime?</p>
        
        <p><br><b>Esta consulta entrega:</b><br><br>
            
        <b>Nombre:</b> Nombre del anime en el top.<br>
        <b>Cantidad de vistas:</b> Número de visualizaciones que tiene el anime.<br>
        <b>Puntuación promedio entre usuarios:</b> Score alcanzado por el anime en cuestión.<br><br>
        
        <b>Personaliza tu Consulta:</b><br><br>
        
        <b>Top:</b> Elige cuántos mostrar animes mostrar (5, 10, 15, etc.).<br><br>

        ¡Tú decides el TOP a mostrar! 🏆</p>

        <div class="consulta-sql">
            <pre>
        SELECT 
            t1."Name",
            t1."Members" AS "Members_Tab1",
            t2."Members" AS "Members_Tab2",
            (t1."Members" + t2."Members") / 2 AS "Avg_Members",
            (t1."Score" + t2."Score") / 2 AS "Avg_Score"
        FROM 
            anime_dataset_2023 t1
        INNER JOIN 
            anime_filtered t2 ON t1.anime_id = t2.anime_id
        ORDER BY 
            (t1."Members" + t2."Members") DESC
        LIMIT $limit;
            </pre>
        </div>

        <!-- Formulario para ingresar los datos de la consulta -->
        <div class="formulario container"> 
            <form action="resultados1.php" method="post">
                <div class="input-group">

                    <div class="input-container">
                        <input type="text" id="limit" name="limit" placeholder="Ingrese la cantidad de animes a consultar" required>
                        <i class="fas fa-star"></i>
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

