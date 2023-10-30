<?php 

include_once 'partials/header.tpl.php';?>
<body>
    <h1><?= $title; ?></h1>

    <a href="?url=login">Ir al login</a>
    
    <form action="?url=registerAction" method="POST">
<!-- el cliente nos tiene que reellenar los datos y nosotros en registerAction nos encargamso de meterlo en la base de datos y que quede registrado y pueda acceder a nuestra app web -->
    <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="user_type">Selecciona el tipo de usuario:</label>
        <select id="user_type" name="user_type">
        <option value="students">Estudiante</option>
        <option value="teachers">Profesor</option>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php include_once 'partials/footer.tpl.php';?>
</body>
</html>



    

