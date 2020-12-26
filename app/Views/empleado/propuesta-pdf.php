<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Pedido</title>
    <?php load_style(['pdf']) ?>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img class="logo" src="<?= src('app/logo.png') ?>">
        </div>
        <h1><?= "COTIZACION - " . $data["sNombreNegocio"] ?></h1>
        <div class="company clearfix">
            <div><?= $data["sNombreNegocio"] ?></div>
            <div><?= $data["sDireccion"] ?></div>
        </div>


        <div class="project mr-datos-cliente">
            <div>
                <h3>DATOS DEL CLIENTE</h3>
            </div>
            <div>
                <span><?= strtoupper($data['sTipoDocumento']) ?>: </span>
                <?= $data['sNumeroDocumento'] ?>
            </div>
            <div><span>CLIENTE: </span>  <?= $data['sCliente'] ?></div>
            <div><span>EMAIL: </span> <a href="mailto: <?= $data['sEmailCliente'] ?>"><?= $data['sEmailCliente'] ?></a>
            </div>
        </div>


    </header>
    <main>


        <table>
            <thead>
                <tr>
                    <th class="service">ITEM</th>
                    <th class="desc">PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php $subtotal = 0; ?>
                <?php foreach ($pedido->productos as $key => $producto) : ?>
                    <?php
                    $total = $producto->precio *  $producto->cantidad;
                    $subtotal += $total;
                    ?>
                    <tr>
                        <td class="service"><?= ($key + 1) ?></td>
                        <td class="desc">
                            <p class="mb-0"><?= $producto->producto->nombre ?></p>
                            <?php if (count($producto->atributos) > 0) : ?>
                                <?php foreach ($producto->atributos as $atrib) : ?>
                                    <div>
                                        <small><?= $atrib->producto_atributo->atributo_valor->atributo->nombre ?>
                                            - <?= $atrib->producto_atributo->atributo_valor->valor ?></small>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </td>
                        <td><?= nf($producto->cantidad) ?></td>
                        <td><?= SIMBOLO_MONEDA . nf($producto->precio) ?></td>
                        <td><?= SIMBOLO_MONEDA . nf($total) ?> </td>
                    </tr>
                <?php endforeach ?>

                <?php
                $igv = $subtotal * 0.18;
                $total = $subtotal + $igv;
                if (!empty($pedido->cupon->id)) {
                    $descuento = logicaPorcentajeMonto($total, $pedido->cupon->tipo, $pedido->cupon->numero);
                    $total = $total - $descuento;
                }
              
                ?>

                <tr>
                    <td colspan="4">SUBTOTAL</td>
                    <td class="total"><?= SIMBOLO_MONEDA . nf($subtotal) ?></td>
                </tr>

                <tr>
                    <td colspan="4">IGV</td>
                    <td class="total"><?= SIMBOLO_MONEDA . nf($igv) ?></td>
                </tr>

           
          
                <tr>
                    <td colspan="4" class="grand total">TOTAL</td>
                    <td class="grand total"> <?= SIMBOLO_MONEDA . nf($total) ?> </td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div></div>
            <div class="notice"></div>
        </div>

    </main>
    <footer>
        <?= NOMBRE_SITIO ?> - <?= date("Y") ?>
    </footer>
</body>

</html>