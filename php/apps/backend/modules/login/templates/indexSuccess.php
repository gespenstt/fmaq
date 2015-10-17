    <form action="<?php echo url_for("login/index");?>" method="post">
    
      <h1>Login</h1>    
      
      <div class="login-fields">
          
        <?php if($msg){ ?>
          <div class="alert alert-danger">
             <?php echo $msg; ?>
          </div>
        <?php } ?>
        
        <p>Ingrese con sus credenciales:</p>
        
        <div class="field">
          <label for="username">Usuario:</label>
          <input type="text" name="usuario" value="" placeholder="Usuario" class="form-control input-lg username-field" required="required" />
        </div> <!-- /field -->
        
        <div class="field">
          <label for="password">Contraseña:</label>
          <input type="password" name="password" value="" placeholder="Contraseña" class="form-control input-lg password-field" required="required"/>
        </div> <!-- /password -->
        
      </div> <!-- /login-fields -->
      
      <div class="login-actions">
                  
        <button class="login-action btn btn-primary">Ingresar</button>
        
      </div> <!-- .actions -->
      
    </form>