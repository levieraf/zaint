<?php /* Smarty version 2.6.21, created on 2013-08-02 19:43:15
         compiled from index.tpl */ ?>
<!DOCTYPE html>
<html>
    <head>
        <title>.: M&oacute;dulo de Facturaci&oacute;n e Inventario :.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Aqui estaba una inclusion del header.tpl, <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>-->
        <link type="text/css" rel="stylesheet" href="../../../includes/css/login.otro.css" />
        <link type="text/css" rel="stylesheet" href="../../../includes/css/estilos.css" />
        <link rel="shortcut icon" href="../../../includes/imagenes/selectra.ico" />
        <?php echo '
            <style type="text/css">
                .oculto { display: none; }
                .visible { display: inline; }
            </style>
        '; ?>

    </head>
    <body>
        <div id="login">
            <div id="logo">
                <img src="../../../includes/imagenes/login_logo.png"/>
            </div>
            <div id="cont">
                <form method="post">
                    <ul>
                        <li></li>
                        <li>
                            <label>Inicia sesi&oacute;n</label>
                        </li>
                            <!-- <label for="username"><b>Nombre de usuario</b></label> -->
                            <input type="text" name="txtUsuario" id="username" placeholder="Nombre de usuario" class="form-text" />
                            <?php echo '
                                <script type="text/javascript">//<![CDATA[
                                        document.getElementById("username").focus();
                                //]]>
                                </script>
                            '; ?>

                        </li>
                        <li>
                            <br/>
                            <!-- <label for="password"><b>Contrase&ntilde;a</b></label> -->
                            <input type="password" name="txtContrasena" id="password" placeholder="Contrase&ntilde;a" class="form-text" />
                        </li>
                        <li>
                            <input type="submit" name="submit" id="submit" value="Ingresar" />
                        </li>
                        <!--li>
                            <a style="color: blue" href="../../../sistemas.php" ><img src="../../../includes/imagenes/back.gif"/>&nbsp;Ir al Men&uacute; de Sistemas</a>
                        </li-->
                    </ul>
                    <!--div>
                        <input type="submit" name="submit" id="submit" value="Ingresar" />
                    </div-->
                </form>
            </div>
            <div style="text-align: center;">
                <a style="color: blue;" href="../../../sistemas.php"><img src="../../../includes/imagenes/back.gif"/>&nbsp;Ir al Men&uacute; de Sistemas</a>
            </div>
            <div style="text-align: center">
                <span id="mensaje_acceso" class="oculto" style="color: red; white-space: nowrap;">Acceso denegado: Nombre de usuario o contrase&ntilde;a incorrecto.</span>
                <?php if ($this->_tpl_vars['acceso'] == 0): ?>
                    <br/>
                    <script type="text/javascript">//<![CDATA[
                        document.getElementById("mensaje_acceso").className = "visible";
                    //]]>
                    </script>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>