 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="assets/css/Login.styles.css">
     <title>GTD</title>
   </head>
   <body>
     <div class="login">
        <div class="login-triangle"></div>
  
          <h2 class="login-header">GTD</h2>

            <form class="login-container" action="../Controlador/controller.ajax.login.php" method="post">
              <p><input id="usrname" type="text" name="user" value="" placeholder="Usuario" required></p>
              <p><input id="psw" type="password" name="pass" value="" placeholder="password" required></p>
              <p><button type="submit" class="">Ingresar</button></p>
            </form>
      </div>
     


   </body>
 </html>
