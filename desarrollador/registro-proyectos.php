<?php
session_start(); 
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       

headerDinamico($conexion);

// Verifica si el usuario está autenticado
if (!isset($_SESSION['Correo'])) {
    // Redirige al usuario al formulario de inicio de sesión si no está autenticado
    header('Location: ../login.php');
    exit();
}

// Obtén el id_usuario asociado al correo electrónico de la sesión
$correoUsuario = $_SESSION['Correo'];
$query = "SELECT id_usuario FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($query);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

$stmt->bind_param("s", $correoUsuario);
$stmt->execute();
$stmt->bind_result($id_usuario);

// Comprueba si se encontró un usuario con el correo electrónico proporcionado
if ($stmt->fetch()) {
    // El usuario fue encontrado, guarda el id_usuario en la sesión
    $_SESSION['id_usuario'] = $id_usuario;
} else {
    // No se encontró un usuario con el correo electrónico proporcionado
    // Redirige al usuario al formulario de inicio de sesión
    header('Location: ../login.php');
    exit();
}

// Cierra la declaración
$stmt->close();

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar proyecto en base a las palabras clave
    $nombreProyecto = $_POST['nom_proyecto'];
    $descripcion = $_POST['descripcion'];

    if (!validarPalabrasClave($nombreProyecto, $descripcion)) {
        
        $_SESSION['errorRegistro'] = "Basandanos en la descripción proporcionada del proyecto, no podemos garantizar su viabilidad
        en este momento. Es posible que falten detalles criticos o que existan riesgos no mencionados. Te recomendamos proporcionar
        información adicional para una evaluaciòn mas precisa de la viabilidad del proyecto.";

        
        header('Location: registro-proyectos.php');
        exit();
    }
   

    // Verificar si se ha enviado un archivo
    if (isset($_FILES['imagen'])) {
        // Ruta de destino para guardar la imagen
        $rutaDestino = '../uploads/' . $_FILES['imagen']['name'];

        // Mover el archivo al directorio de destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            // La imagen se ha cargado correctamente

            // Recuperar datos del formulario
            $Nombre_proyecto = $_POST['nom_proyecto'];
            $Categorias = $_POST['categoria'];
            $meta_financiacion = $_POST['meta_financiacion'];
            $Descripcion = $_POST['descripcion'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_termino = $_POST['fecha_termino'];

            // Obtener el ID del usuario de la sesión
            $id_usuario = $_SESSION['id_usuario'];

            // Insertar datos en la base de datos con el ID del usuario
            $sql = "INSERT INTO proyectos (id_user, nom_proyecto, categoria, meta_financiacion, descripcion, fecha_inicio, fecha_termino, imagen) VALUES (?,?,?,?,?,?,?,?)";

            // Preparar la sentencia
            $stmt = $conexion->prepare($sql);

            if (!$stmt) {
                die("Error en la preparación de la consulta: " . $conexion->error);
            }

            // Vincular parámetros y ejecutar la consulta
            $stmt->bind_param("isssssss", $id_usuario, $Nombre_proyecto, $Categorias, $meta_financiacion, $Descripcion, $fecha_inicio, $fecha_termino, $rutaDestino);

            if ($stmt->execute()) {
                // Éxito: los datos se han insertado correctamente en la base de datos

                // Guarda los datos en una sesión
                $_SESSION['NuevoProyecto'] = $_POST;
                $_SESSION['NuevoProyecto']['imagen'] = $rutaDestino;

                // Redirige al usuario a la página de categoría correspondiente
                if ($Categorias === 'Educación') {
                    
                    header('Location: ../categorias/educacion.php');
                } elseif ($Categorias === 'Negocios y emprendimiento') {
                    header('Location: ../categorias/NegociosyEmprendimiento.php');
                } elseif ($Categorias === 'Gobierno y servicios públicos') {
                    header('Location: ../categorias/GobiernoyServicios.php');
                } elseif ($Categorias === 'Social y sin fines de lucro') {
                    header('Location: ../categorias/SocialySinFines.php');
                } elseif ($Categorias === 'Salud') {
                    header('Location: ../categorias/Salud.php');
                } // Agrega más categorías según sea necesario

                exit();
            } else {
                // Error
                $errorRegistro = "Error en el registro, intenta de nuevo.";
                header('Location: perfil.php?error=' . urlencode($errorRegistro));
                exit();
            }
        } else {
            // Si no se pudo mover la imagen, muestra un mensaje de error
            $errorRegistro = "Error al subir la imagen.";
            header('Location: perfil.php?error=' . urlencode($errorRegistro));
            exit();
        }
    } else {
        // Si no se ha enviado un archivo, muestra un mensaje de error
        $errorRegistro = "Debes seleccionar una imagen.";
        header('Location: perfil.php?error=' . urlencode($errorRegistro));
        exit();
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
}

// Función de validación de palabras clave/
function validarPalabrasClave($nombreProyecto, $descripcion) {
    $palabrasClave = array('abanto', 'abrazafarolas', 'adufe', 'afloja', 'alcornoque', 'alfeñíque', 'anal', 'andurriasmo', 'argentuzo', 'argentuso', 'argentucho', 'arrastracueros', 'Arse', 'Arsehole', 'arseholes', 'artabán', 'artaban', 'ass', 'asshole', 'assholes', 'auschwitz', 'ausschwitz', 'aguebonado', 'aguebonada', 'agüevonado', 'agüevonada', 'asco', 'asqueroso', 'asquerosa', 'aweonado', 'aweonada', 'awebonado', 'awebonada', 'awevonado', 'awevonada', 'baboso', 'babosa', 'babosadas', 'basura', 'Bellaco', 'bitch', 'bizcocho', 'blow', 'Blowjob', 'Bollocks', 'bolú', 'bolu', 'boludo', 'b0ludo', 'bolud0', 'b0lud0', 'boluda', 'b0luda', 'boobs', 'bufarron', 'bufarrón', 'bujarron', 'bujarrón', 'buey', 'Bullshit', 'buttfuck', 'buttfucker', 'cabilla', 'cabron', 'cabrón', 'cabrona', 'caca', 'Cachapera', 'cagalera', 'cagar', 'caga', 'cagante', 'cagarla', 'cagaste', 'cagón', 'cagon', 'cagona', 'cancer', 'cáncer', 'Carado', 'caramonda', 'caramono', 'caremono', 'caramondá', 'caraculo', 'careculo', 'carepito', 'carapito', 'carapendejo', 'carependejo', 'castra', 'castroso', 'castrosa', 'castrante', 'chacha', 'chachar', 'chichar', 'chichis', 'chilote', 'chinga', 'chinga tu madre', 'chingadera', 'chingada', 'chingado', 'chíngate', 'chingate', 'chingar', 'chingas', 'chingaste', 'chingo', 'chingon', 'chingón', 'chingona', 'chingues', 'chinguisa', 'chinguiza', 'Chink', 'Chinky', 'chiquitingo', 'chocha', 'chój', 'chucha', 'chuchamadre', 'chuj', 'chupalo', 'chúpalo', 'chúpala', 'chupala', 'chwdp', 'cipa', 'cipo', 'cochon', 'cochón', 'cock', 'Cock', 'Cocks', 'Cocksucker', 'cogas', 'cojas', 'coger', 'cojete', 'cojón', 'cojon', 'cochar', 'coshar', 'cocho', 'comecaca', 'comepollas', 'comepoyas', 'coñazo', 'coñaso', 'concha', 'conchatumadre', 'conchadetumadre', 'conxetumare', 'conxetumadre', 'conxatumare', 'conxatumadre', 'conchetumare', 'conchatumare', 'coño', 'creído', 'creida', 'cuca', 'cueco', 'Cul', 'culea', 'culear', 'culera', 'culero', 'culiado', 'culiada', 'culiao', 'culia', 'culiad@', 'culo', 'Culo', 'Cum', 'Cunt', 'cunts', 'ctm', 'csm', 'Dick', 'Dickhead', 'Dicks', 'encabrona', 'encabronado', 'encabronada', 'emputar', 'enputar', 'emputo', 'enputo', 'empute', 'emputado', 'emputada', 'enputado', 'enputada', 'encular', 'Enculé', 'enculer', 'encula', 'enculada', 'enculado', 'enculo', 'estafador', 'estafadora', 'estupido', 'estúpido', 'estupida', 'estúpida', 'Faggot', 'falkland', 'falklands', 'fucklands', 'fuckland', 'falangista', 'fascista', 'Fellatio', 'fick', 'fistfuck', 'follada', 'follar', 'follo', 'follón', 'follon', 'Fook', 'Fooker', 'Fooking', 'Fotze', 'follada', 'foyada', 'frei', 'frijolero', 'Fuck', 'Fucker', 'Fücking', 'Führer', 'gärcha', 'gilipolla', 'guätepeor', 'jilipolla', 'gächupín', 'gächupin', 'gilipoya', 'jilipoya', 'gonorrea', 'guevón', 'guevón', 'guevona', 'guey', 'heil', 'hideputa', 'hijodeputa', 'hijoputa', 'hdp', 'hitler', 'Hitler', 'hueva', 'huevón', 'huevón', 'huevona', 'HWDP', 'idiota', 'imbécil', 'imbecil', 'jalabola', 'Japseye', 'jebanie', 'jebca', 'jilipollas', 'Jizz', 'job', 'jodan', 'jodas', 'jodaz', 'joder', 'jodido', 'jodida', 'joto', 'joyo', 'judenmutter', 'judensöhne', 'kaka', 'caka', 'kaca', 'kabrón', 'kabrón', 'kabróna', 'Kike', 'korwa', 'kórwa', 'kurwa', 'kurwia', 'kutas', 'leck', 'leche', 'leche', 'm4nco', 'macht', 'maldito', 'maldita', 'malnacida', 'Malnacido', 'malparida', 'malparido', 'Malvinas', 'mamada', 'mamadas', 'mamado', 'mámalo', 'mámarla', 'mamaste', 'mames', 'mamón', 'mamon', 'mamona', 'manco', 'manko', 'manca', 'maraca', 'Marica', 'marico', 'Maricon', 'Maricón', 'maricones', 'maricona', 'mariconas', 'mariconson', 'mariconsón', 'mariconzón', 'mariconzon', 'mariqueta', 'mariquis', 'mayate', 'meco', 'mecos', 'melgambrea', 'merde', 'mexicaca', 'mejicaca', 'mexicoño', 'mejicoño', 'mejicaño', 'mexicaño', 'mich', 'mierda', 'm1erda', 'mierdero', 'mondá', 'monda', 'Mong', 'moraco', 'motherfücker', 'Motherfucking', 'Nazi', 'neger', 'negrata', 'Nègre', 'negrero', 'nekrofil', 'Nigga', 'Nigger', 'niggers', 'Niquer', 'no mames', 'odbyt', 'odjeba&H142o', 'ojete', 'ogete', 'pajear', 'pajote', 'Paki', 'pakis', 'panocha', 'Paragua', 'payaso', 'payasa', 'pecheche', 'peda', 'pederasta', 'pedo', 'pedota', 'pedota', 'pedofila', 'pedófila', 'pedofilo', 'pedófilo', 'pedón', 'pendeja', 'pendejear', 'pendejo', 'pendejos', 'pendejas', 'pelotudo', 'pel0tud0', 'pelotuda', 'pel0tuda', 'pene', 'percanta', 'perra', 'Perucho', 'pete', 'pierdol', 'pierdolic', 'pierdolona', 'Pinacate', 'pinche', 'pinches', 'pinga', 'pirobo', 'pito', 'pitudo', 'pizda', 'polla', 'porno', 'poronga', 'poya', 'Prick', 'Pricks', 'prostiputo', 'prostiputa', 'prostituir', 'prostituta', 'prostituto', 'proxeneta', 'pt', 'pucha', 'Puñeta', 'Pussy', 'puta', 'Putain', 'Putaso', 'Putazo', 'pute', 'Pute', 'Putete', 'putillo', 'putiyo', 'putito', 'putita', 'putitos', 'putitas', 'Putiza', 'puto', 'putos', 'putón', 'ql', 'qli40', 'qliao', 'qli4o', 'qlia0', 'qliaos', 'qli40s', 'qli4os', 'qlia0s', 'Queer', 'raghead', 'ragheads', 'rallig', 'ramera', 'rape', 'reculia', 'reculiao', 'retardado', 'retrasado', 'retrazado', 'renob', 'reql', 'rentafuck', 'ridiculo', 'ridículo', 'ridicula', 'ridícula', 'rimjob', 'rimming', 'rozpierdala&H107', 'rozpierdolone', 'rozpierdolony', 'rucha&H107', 'ruchanie', 'ruha&H107', 'ruski', 'ruskoff', 'ruskov', 's-c-v-m', 's.hit', 's&m', 's1ut', 'sackgesicht', 'sado-masochistic', 'sadomaso', 'sadomasochistic', 'sadomasoquismo', 'sadomasoquista', 'salame', 'salvatrucha', 'salvatrusha', 'salbatrucha', 'salbatrusha', 'samckdaddy', 'sandm', 'sandnigger', 'sangron', 'sangrón', 'sangrona', 'sangrones', 'sangronas', 'sarasa', 'sarracena', 'sarraceno', 'satan', 'satán', 'satánico', 'satanico', 'sausagejockey', 'sc*m', 'scat', 'schamhaar', 'scheiss', 'schlampe', 'schleu', 'schleuh', 'schlitzauge', 'schlong', 'schutzstaffel', 'schwanz', 'schwuchtel', 'scrote', 'scum', 'scum!', 'sh!t', 'sh!te', 'sh!tes', 'sh1t', 'sh1t', 'sh1te', 'sh1thead', 'sh1theads', 'shadybackroomdealings', 'shadydealings', 'shag', 'shaggers', 'shaggin', 'shagging', 'shat', 'shawtypimp', 'sheep-l0ver', 'sheep-l0vers', 'sheep-lover', 'sheep-lövers', 'sheep-shaggers', 'sheepl0ver', 'sheepl0vers', 'sheeplover', 'sheepshaggers', 'sheethead', 'sheetheads', 'sheister', 'shhit', 'shit', 'shít', 'shit4brains', 'shitäss', 'shitbäg', 'shitbagger', 'shitbrains', 'shitbreäth', 'shitcunt', 'shitdick', 'shiteater', 'shited', 'shitfäce', 'shitfaced', 'shitforbrains', 'shitfuck', 'shitfücker', 'shitfull', 'shithapens', 'shithappens', 'shithead', 'shithole', 'shithouse', 'shiting', 'shitings', 'shitoutofluck', 'shits', 'shitspitter', 'shitstabber', 'shitstabbers', 'shitstain', 'shitted', 'shitter', 'shitters', 'shittiest', 'shitting', 'shittings', 'shitty', 'shiz', 'shiznit', 'shortfuck', 'shortfuck', 'shyte', 'sida', 's1da', 'sidoso', 's1doso', 'slag', 'slanderyou2.blogspot.com', 'slanteye', 'slut', 'slutbäg', 'sluts', 'slutt', 'slutting', 'slutty', 'slutweär', 'slutwhöre', 'slutwhore', 'smackdaddy', 'smackthemonkey', 'smagma', 'smärtass', 'smeg', 'snortingcoke', 'sonofäbitch', 'sorete', 'sonofbitch', 'soplapollas', 'soplapoyas', 'Spacka', 'Spast', 'Spasten', 'Spasti', 'Spaz', 'Spunk', 'Spunkbubble', 'sranie', 'subnormäl', 'sucker', 'sudaca', 'sudaka', 'tarado', 'tarada', 'tarados', 'taradas', 'tarugo', 'tetas', 'tetona', 'tolete', 'tortillera', 'tortiyera', 'torpe', 'traga', 'Tranny', 'Twät', 'verga', 'vergasen', 'vergön', 'vergon', 'violär', 'Violer', 'Wank', 'Wanker', 'weon', 'weona', 'wey', 'wn wehon', 'wheon', 'weohn', 'weonh', 'w3on', 'wetback', 'wyjeb&H107', 'wyjebac', 'wyjebany', 'wypierdol', 'xuxa', 'xuxas', 'Yoruga', 'zajeba&H107', 'zajebane', 'zajebany', 'zemen', 'zooplapollas', 'zoplapollas', 'zorra', 'zorriputa', 'zudaca', 'zudaka'); // Reemplaza con tus palabras clave
    foreach ($palabrasClave as $palabra) {
        // Verifica si la palabra clave está presente en la descripción
        if (stripos($nombreProyecto, $palabra) !== false || stripos($descripcion, $palabra) !== false) {
            return false; // Proyecto no válido
        }
    }
    return true;
}
// Termina Función de validación de palabras clave/
    // Initialize $errorRegistro variable
$errorRegistro = "";

// Verifica si hay un mensaje de error en la sesión
if (isset($_SESSION['errorRegistro'])) {
    $errorRegistro = $_SESSION['errorRegistro'];
    // Limpia el mensaje de error en la sesión
    unset($_SESSION['errorRegistro']);
}

    // Termina funcion de validacion
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Registro</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../css/owl.carousel.min.css" rel="stylesheet">
        <link href="../css/owl.theme.default.min.css" rel="stylesheet">
        <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
        <link href="../css/index.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body>

        <main>

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row d-flex justify-content-center">

                        <div class="col-lg-6 col-12">
                            <form class="custom-form hero-form" action="registro-proyectos.php" method="POST" role="form" enctype="multipart/form-data">
                                <h3 class="text-white mb-3 d-flex justify-content-center">Proyecto.</h3>

                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-pencil-fill custom-icon"></i></span>
                                            <input type="text" name="nom_proyecto" id="nom_proyecto" class="form-control" placeholder="Nombre proyecto." required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-card-text custom-icon"></i></span>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion." required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-list custom-icon"></i></span>
                                            <select class="form-select" id="categoria" name="categoria" required>
                                                <option value="Educación">Educación.</option>
                                                <option value="Negocios y emprendimiento">Negocios y emprendimiento.</option>
                                                <option value="Gobierno y servicios públicos">Gobierno y servicios publicos.</option>
                                                <option value="Social y sin fines de lucro">Social y sin fines de lucro.</option>
                                                <option value="Salud">Salud.</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-cash-coin custom-icon"></i></span>
                                            <input type="number" name="meta_financiacion" id="meta_financiacion" class="form-control" placeholder="Meta de financiación." required pattern="[0-9]+" title="Ingrese solo números">
                                        </div>
                                    </div>
<!-- Campo fecha_inicio --> 
                                <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi-calendar2 custom-icon"></i></span>
                                                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" placeholder="Fecha de inicio." required title="Fecha de inicio">
                                        </div>
                                    </div>
                                    <!-- Campo fecha_termino -->
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-calendar2-check custom-icon"></i></span>
                                            <input type="date" name="fecha_termino" id="fecha_termino" class="form-control" placeholder="Fecha de término." required title="Establece una fecha de término no mayor a un año">
                                    </div>
                                </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="bi-image custom-icon"></i></span>
                                            <input type="file"  class="form-control" name="imagen" id="imagen" accept="image/*" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <button type="submit" class="form-control">
                                            Subir proyecto.
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
            <div id="errorModal" class="modal" style="<?php echo !empty($errorRegistro) ? 'display:block;' : ''; ?>">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p id="modalMessage"><?php echo $errorRegistro; ?></p>
                <button id="closeModalBtn">Cerrar.</button>
            </div>
        </div>
            <!-- Agrega el script para inicializar el Datepicker -->
            <script>
                $(function () {
                    $("#fecha_inicio").datepicker();
                    $("#fecha_termino").datepicker();
                });
    var modal = document.getElementById('errorModal');
    var closeBtn = document.getElementsByClassName('close')[0];
    var closeBtnModal = document.getElementById('closeModalBtn');

    closeBtn.onclick = function () {
        modal.style.display = 'none';
    };

    closeBtnModal.onclick = function () {
        modal.style.display = 'none';
    };

<?php if (isset($_SESSION['errorRegistro']) && !empty($_SESSION['errorRegistro'])) { ?>
        modal.style.display = 'block';
    <?php } ?>

            </script>
            
            <script>
    document.addEventListener('DOMContentLoaded', function() {
        var nombreProyectoInput = document.getElementById('nom_proyecto');
        var descripcionInput = document.getElementById('descripcion');

        // Función para autocorregir acentos
        function autocorrectAccents(str) {
            var map = {
                'á': 'á', 'é': 'é', 'í': 'í', 'ó': 'ó', 'ú': 'ú',
                'Á': 'Á', 'É': 'É', 'Í': 'Í', 'Ó': 'Ó', 'Ú': 'Ú'
            };
            return str.replace(/[áéíóúÁÉÍÓÚ]/g, function(match) {
                return map[match];
            });
        }

        // Función para capitalizar la primera letra de la primera palabra
        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        // Agrega eventos oninput a los campos
        nombreProyectoInput.addEventListener('input', function() {
            this.value = autocorrectAccents(this.value);
            this.value = capitalizeFirstLetter(this.value);
        });

        descripcionInput.addEventListener('input', function() {
            this.value = autocorrectAccents(this.value);
            this.value = capitalizeFirstLetter(this.value);
        });
    });
</script>



            <script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date();
        document.getElementById('fecha_inicio').valueAsDate = today;
        updateMaxEndDate();
    });

    function updateMaxEndDate() {
        var startDate = new Date(document.getElementById('fecha_inicio').value);
        var endDateLimit = new Date(startDate);
        endDateLimit.setFullYear(endDateLimit.getFullYear() + 1);
        var maxEndDate = endDateLimit.toISOString().split('T')[0];
        document.getElementById('fecha_termino').setAttribute('max', maxEndDate);
    }

    document.getElementById('fecha_inicio').addEventListener('change', function() {
        updateMaxEndDate();
    });

    document.getElementById('fecha_termino').addEventListener('change', function() {
    });
</script>

        </main>

        <!--
    Footer
    -->
        <?php
        include '../footer.php';
        ?>

            <!-- JAVASCRIPT FILES -->
            <script src="../js/jquery.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/owl.carousel.min.js"></script>
            <script src="../js/counter.js"></script>
            <script src="../js/custom.js"></script>
            <script src="../js/scripteye.js"></script>

           

        </body>
    </html>
