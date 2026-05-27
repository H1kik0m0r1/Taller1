<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Juego de Lotería - Univalle</title>
</head>
<body>
    <div class="game-container">
        <?php
        // Ajustamos también el valor por defecto a 2000 para mantener la consistencia
        $puntaje = isset($_SESSION['puntaje']) ? $_SESSION['puntaje'] : 2000;
        $resultado = $_SESSION['resultado'] ?? '¡Prueba tu suerte!';
        $numeros = $_SESSION['numeros'] ?? [1, 1, 1];
        
        // Asignar clase dinámica según el resultado para mejorar la respuesta visual
        $claseResultado = '';
        if ($resultado === 'Ganaste') $claseResultado = 'success';
        if ($resultado === 'Perdiste') $claseResultado = 'danger';
        if ($resultado === 'Game Over') $claseResultado = 'game-over';
        ?>
        
        <header>
            <h1>🎰 Súper Lotería</h1>
            <div class="score-board">
                <span>PUNTUACIÓN</span>
                <h2 id="puntaje"><?php echo $puntaje; ?></h2>
            </div>
        </header>
        
        <main>
            <div class="imagenes-container">
                <div class="slot-card"><img src="imagenes/<?php echo $numeros[0]; ?>.jpg" alt="Slot 1" /></div>
                <div class="slot-card"><img src="imagenes/<?php echo $numeros[1]; ?>.jpg" alt="Slot 2" /></div>
                <div class="slot-card"><img src="imagenes/<?php echo $numeros[2]; ?>.jpg" alt="Slot 3" /></div>
            </div>
            
            <div class="feedback-message <?php echo $claseResultado; ?>">
                <h3><?php echo $resultado; ?></h3>
            </div>
        </main>
        
        <footer>
            <?php if ($resultado === 'Game Over') { ?>
                <button class="btn btn-restart" onclick="location.href='index.php'">🔄 Vuelve a jugar</button>
            <?php } else { ?>
                <button class="btn btn-play" onclick="location.href='index.php?action=jugar'">🎲 Jugar</button>
                <button class="btn btn-save" onclick="location.href='index.php?action=guardar'">💾 Guardar Puntaje</button>
            <?php } ?>
        </footer>
    </div>
</body>
</html>