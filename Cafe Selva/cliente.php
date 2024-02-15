<?php
session_start();
// Verificar si hay un carrito en la sesión o crear uno nuevo
if(!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Función para agregar un producto al carrito
// Función para agregar un producto al carrito
function agregarAlCarrito($producto) {
    // Verificar si el producto ya está en el carrito
    $encontrado = false;
    foreach ($_SESSION['carrito'] as &$p) {
        $parts = explode(' ', $p);
        $nombre = $parts[0];
        if ($nombre === $producto) {
            $encontrado = true;
            $cantidad = intval($parts[1]);
            $cantidad++;
            $p = $producto . ' ' . $cantidad;
            break;
        }
    }

    // Si no se encontró, agregarlo al carrito con cantidad 1
    if (!$encontrado) {
        array_push($_SESSION['carrito'], $producto . ' 1');
    }
} 


// Función para vaciar el carrito
function vaciarCarrito() {
    $_SESSION['carrito'] = array();
}

function calcularSubtotal() {
    $subtotal_por_producto = array(); // Aquí almacenaremos los subtotales por producto
    foreach ($_SESSION['carrito'] as $producto) {
        $parts = explode(' ', $producto);
        $nombre = $parts[0];
        $precio = floatval($parts[1]);
        $cantidad = intval($parts[2]);
        
        // Calcular el subtotal para este producto
        $subtotal_producto = $precio * $cantidad;
        
        // Si ya existe un subtotal para este producto, agregar al subtotal existente
        if (array_key_exists($nombre, $subtotal_por_producto)) {
            $subtotal_por_producto[$nombre] += $subtotal_producto;
        } else {
            // Si no existe un subtotal para este producto, crear uno nuevo
            $subtotal_por_producto[$nombre] = $subtotal_producto;
        }
    }
    
    // Calcular el subtotal total sumando los subtotales de cada producto
    $subtotal_total = array_sum($subtotal_por_producto);
    
    return $subtotal_total;
}



// Calcular total con IVA
function calcularTotalConIVA() {
    $subtotal = calcularSubtotal();
    $iva = 0.16; // Porcentaje de IVA
    $total = $subtotal + ($subtotal * $iva);
    return $total;
}


// Si se presiona el botón "Agregar al carrito", agregar el producto al carrito

    
    if(isset($_POST['agregar_cafe1'])) {
        agregarAlCarrito($_POST['producto']);
    } elseif(isset($_POST['agregar_cafe2'])) {
        agregarAlCarrito($_POST['producto2']);
    } elseif(isset($_POST['agregar_cafe3'])) {
        agregarAlCarrito($_POST['producto3']);
    } elseif(isset($_POST['agregar_cafe4'])) {
        agregarAlCarrito($_POST['producto4']);
    } elseif(isset($_POST['agregar_cafe5'])) {
        agregarAlCarrito($_POST['producto5']);
    } elseif(isset($_POST['agregar_cafe6'])) {
        agregarAlCarrito($_POST['producto6']);
    }


// Si se presiona el botón "Pagar", mostrar el subtotal y total con IVA
if(isset($_POST['pagar'])) {
    //echo "<p>Subtotal: $" . calcularSubtotal() . "</p>";
    //echo "<p>Total con IVA: $" . calcularTotalConIVA() . "</p>";
    vaciarCarrito();
    echo "<p>Compra Exitosa.</p>";
}

// Si se presiona el botón "Vaciar carrito", vaciar el carrito
if(isset($_POST['vaciar'])) {
    vaciarCarrito();
    echo "<p>Carrito vaciado.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Selva - Sabor a Chiapas</title>
    <link rel="stylesheet" href="./styles/cliente.css">
</head>
<body>
    <section class="header">
        <div class="containerMaya">
            <img id="imgMaya" src="./img/maya.png" alt="">
        </div>
    </section>
    <section class="bodyPage">
        <p id="tituleProduct">Nuestros Productos</p>
        <div class="carruselProduct">
            <div class="cardProduct">
                <div class="imgProduct">
                </div>
                <form class="infoProduct" action="" method="post">
                    <label id="nomProduct" for="">Cafe Americano1</label>
                    <label id="cantProduct" for="">20 oz</label>
                    <div class="containerSubmit">
                        <div class="infoPrecio">
                            <p>$</p>
                            <label id="precioProduct" for="">40.00</label>
                            <p>mxn</p>
                        </div>
                        <input id="producto" type="hidden" name="producto" value="CaféAmericano 1 40">
                        <input id="precio" type="hidden" name="precio" value="40">
                        <input id="cantidad" type="hidden" name="cantidad" value="">
                        <input id="btnSubmit" name="agregar_cafe1" type="submit" value="">
                    </div>
                </form>
            </div>
            <div class="cardProduct">
                <div class="imgProduct">
                </div>
                <form class="infoProduct" action="" method="post">
                    <label id="nomProduct" for="">Cafe Americano2</label>
                    <label id="cantProduct" for="">20 oz</label>
                    <div class="containerSubmit">
                        <div class="infoPrecio">
                            <p>$</p>
                            <label id="precioProduct" for="">20.00</label>
                            <p>mxn</p>
                        </div>
                        <input id="producto2" type="hidden" name="producto2" value="CaféAmericano2 1 20">
                        <input id="precio" type="hidden" name="precio" value="20">
                        <input id="btnSubmit" name="agregar_cafe2" type="submit" value="">
                    </div>
                </form>
            </div>
            <div class="cardProduct">
                <div class="imgProduct">
                </div>
                <form class="infoProduct" action="" method="post">
                    <label id="nomProduct" for="">Cafe Americano3</label>
                    <label id="cantProduct" for="">20 oz</label>
                    <div class="containerSubmit">
                        <div class="infoPrecio">
                            <p>$</p>
                            <label id="precioProduct" for="">10.00</label>
                            <p>mxn</p>
                        </div>
                        <input id="producto3" type="hidden" name="producto3" value="CaféAmericano3 1 10">
                        <input id="precio" type="hidden" name="precio" value="10">
                        <input id="btnSubmit" name="agregar_cafe3" type="submit" value="">
                    </div>
                </form>
            </div>
            <div class="cardProduct">
                <div class="imgProduct">
                </div>
                <form class="infoProduct" action="" method="post">
                    <label id="nomProduct" for="">Cafe Americano4</label>
                    <label id="cantProduct" for="">20 oz</label>
                    <div class="containerSubmit">
                        <div class="infoPrecio">
                            <p>$</p>
                            <label id="precioProduct" for="">30.00</label>
                            <p>mxn</p>
                        </div>
                        <input id="producto4" type="hidden" name="producto4" value="CaféAmericano4 1 30">
                        <input id="precio" type="hidden" name="precio" value="30">
                        <input id="btnSubmit" name="agregar_cafe4" type="submit" value="">
                    </div>
                </form>
            </div>
        </div>
        <div class="containerCarrito">
        <div class="miCarrito">
    <h2>Mi carrito</h2>
    <ul>
        <?php
        // Crear un array para mantener la cantidad de cada producto
        $cantidad_productos = array();
        foreach ($_SESSION['carrito'] as $producto) {
            // Extraer el nombre del producto y la cantidad
            $parts = explode(' ', $producto);
            $nombre = $parts[0];
            $cantidad = intval($parts[1]);
            // Incrementar la cantidad en el array o establecerla en 1 si es la primera vez que se agrega
            if (array_key_exists($nombre, $cantidad_productos)) {
                $cantidad_productos[$nombre] += $cantidad;
            } else {
                $cantidad_productos[$nombre] = $cantidad;
            }
        }
        // Mostrar los productos en el carrito con cantidad
        foreach ($cantidad_productos as $nombre => $cantidad) {
            echo "<li>$nombre - Cantidad: $cantidad</li>";
        }
        ?>
    </ul>
    <form method="post" action="">
        <input type="submit" name="vaciar" value="Vaciar carrito">
    </form>
</div>
<div class="checkOut">
    <form action="" method="post">
        <div class="containersCheckout">
            <p>Subtotal</p>
            <div class="montosCheckout">
                <p>$</p>
                <label for="subtotal"><?php echo calcularSubtotal(); ?></label>
            </div>
        </div>
        <div class="containersCheckout">
            <p>I.V.A</p>
            <div class="montosCheckout">
                <p>$</p>
                <label for="iva"><?php echo calcularSubtotal() * 0.16; ?></label>
            </div>
        </div>
        <div class="containersCheckout">
            <p>Total</p>
            <div class="montosCheckout">
                <p>$</p>
                <label for="total"><?php echo calcularTotalConIVA(); ?></label>
            </div>
        </div>
        <input type="submit" name="pagar" value="Pagar">
    </form>
</div>

        </div>
    </section>
</body>
</html>