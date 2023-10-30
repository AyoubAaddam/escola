<?php include_once 'partials/header.tpl.php';
$cookie=filter_input(INPUT_COOKIE,"recordarme");

if($cookie==true){
   //require 'src/loginController.php';
   $array=filter_input(INPUT_COOKIE,"array");
   $arrayUN=unserialize($array);
   
if(isset($_SESSION['email'])&& isset($_SESSION['password'])){

    $_SESSION['email']=$arrayUN['email'];
    $_SESSION['password']=$arrayUN['password'];

}

}
//<?if(isset($arrayUN)){echo $arrayUN['email'];}
?>
<body>
    <div class="main-container">
        <div class="form-container">
            <h1>Iniciar sesión</h1>
            <!-- login, el cual passa solo los clientes que esten registrados  -->

            <form action="?url=loginAction" method="post">
                <div class="username-container">
                    <label for="email">Email </label>
                    <!-- aqui insertamos los datos en caso de que nuestro cliente nos haya marcado la opcion de que se qude recordado -->
                    <?php if(isset($arrayUN)){
                        echo '<input id="email" name="email" type="email" value='.$arrayUN['email'].' required>';
                        
                        }else{
                            echo '<input id="email" name="email" type="email" required />';
                        }?>
                   
                    
                </div>
                <div class="password-container">
                    <label for="password">Contraseña</label>
                                        <!-- aqui insertamos los datos en caso de que nuestro cliente nos haya marcado la opcion de que se qude recordado-->
                    <?php if(isset($arrayUN)){
                        echo '<input id="password" name="password" type="password" value='.$arrayUN['password'].' required>';
                        
                        }else{
                            echo '<input id="password" name="password" type="password" password />';
                        }?>
                    
                    <label for="recordarme">Recordarme</label>
                    <input id="recordarme" name="recordarme" type="checkbox" />
                    <label for="Aceptar_cookies">Aceptar Cookies</label>
                    <input id="Aceptar_cookies" name="Aceptar_cookies" type="checkbox" />
                </div>
                <a href="?url=register">Ir al registro</a>


                <div class="submit-container">
                    <button class="submit-button" type="submit">ENTRAR</button>
                </div>
            </form>
        </div>
    </div>

    <?php include_once 'partials/footer.tpl.php';?>
</body>
</html>