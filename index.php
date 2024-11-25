<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de Datos Anime 2024</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">Anime 2024 <i class="fas fa-search"></i></a>
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

        <div class="header-content container">
            <div class="header-txt">
                <h1>Base de Datos Anime 2024</h1>
                <p>
                "Bienvenido a Anime 2024, una base de datos interactiva donde puedes explorar 
                información detallada sobre animes y usuarios relacionados. Realiza consultas 
                personalizadas para descubrir datos como los animes más populares, los usuarios más 
                activos, y más. Solo ingresa los parámetros que te interesen, y nuestra 
                herramienta te devolverá resultados claros y organizados. ¡Empieza ahora explorando 
                las opciones de consulta disponibles!"
                </p>  
            </div>    
            <div class="header-img">
                <img src="images/mejores-anime-largos.jpg" alt="" />
            </div>    
        </div>    
    </header>

    <section class="about container">

        <div class="about-img">
            <img src="images/FullmetalAlchemist.jpg" alt="" />
        </div>    
        <div class="about-txt">
            <h2>Sobre Nosotros</h2>

            <p>Somos un grupo de estudiantes de la Facultad de Ciencias Físicas y Matemáticas (FCFM). En el marco del 
            curso de Bases de Datos, nos propusimos crear esta plataforma para que los amantes del anime puedan explorar datos 
            fascinantes de una manera intuitiva y dinámica. Este proyecto combina nuestro gusto por el aprendizaje y nuestra pasión 
            por la tecnología.
            </p>
            <br>
            <p>
             El equipo está conformado por: Bonnie Lagos, Nicolás Sanhueza, Benjamín Soto y Camila Vera. 
            ¡Esperamos que disfrutes navegar por este universo tanto como nosotros disfrutamos creándolo!
            </p>    
        </div>    
    </section>

    <section class="diagram container">

        <div class="diagram-img centered-img">
            <img src="images/Diagrama_ER.jpeg" alt="Diagrama Entidad-Relación" />
        </div>    

    </section>

    <main class="servicios">

        <h2>Consultas posibles</h2>

        <div class="servicios-content container">
            
            <div class="servicio-1">
                <i class="fas fa-search-plus"></i>
                <h3><li><a href="consulta1.php">Consulta 1</a></li></h3>
            </div>

            <div class="servicio-1">
                <i class="fas fa-search-plus"></i>
                <h3><li><a href="consulta2.php">Consulta 2</a></li></h3>
            </div>

            <div class="servicio-1">
                <i class="fas fa-search-plus"></i>
                <h3><li><a href="consulta3.php">Consulta 3</a></li></h3>
            </div>
        </div>    
    </main>

    <footer class="footer">

        <div class="footer-content container">

            <div class="link">
                <a href="#" class="logo">Anime 2024 <i class="fas fa-search"></i></a>
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

    <?php
        include("Administra_consultas.php");
    ?>

</body>
</html>