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
            <img class="logo" src="<?= !empty($aryNegocio['sImagen']) ? src("multi/" . $aryNegocio["sImagen"]) : src('app/logo.png') ?>">
        </div>
        <h1><?= $aryData["sTitulo"] . " - " . sp($aryData["nIdProspecto"]) ?></h1>
        <div class="company clearfix">
            <div><?= $aryNegocio["sNombre"] ?></div>
            <div><?= $aryNegocio["sDireccion"] ?></div>
        </div>


        <div class="project mr-datos-cliente">
            <div>
                <h3>DATOS DEL CLIENTE</h3>
            </div>
            <div>
                <span><?= strtoupper($aryCliente['sTipoDoc']) ?>: </span><?= $aryCliente['sNumeroDocumento'] ?>
            </div>
            <div><span>CLIENTE: </span> <?= $aryCliente['sNombreoRazonSocial'] ?></div>

            <?php if (!empty($aryCliente['sCorreo'])) : ?>
                <div>
                    <span>EMAIL: </span> <a href="mailto: <?= $aryCliente['sCorreo'] ?>"><?= $aryCliente['sCorreo'] ?></a>
                </div>
            <?php endif ?>
        </div>


    </header>
    <main>


        <table>
            <thead>
                <tr>
                    <th class="service">ITEM</th>
                    <th class="desc">TIPO</th>
                    <th class="desc">NOMBRE</th>
                    <th class="desc">IMAGEN</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php $nSubtotal = 0; ?>
                <?php foreach ($aryDataProspectoDetalle as $nkey => $aryDetalle) : ?>
                    <?php
                    $nTotalItem = $aryDetalle["nPrecio"] * $aryDetalle["nCantidad"];
                    $nSubtotal += $nTotalItem;
                    ?>
                    <tr>
                        <td class="service"><?= ($nkey + 1) ?></td>
                        <td class="service"><?= $aryDetalle["sTipoItem"] ?></td>
                        <td class="desc"><?= $aryDetalle["sNombreCatalogo"] ?></td>
                        <td class="desc">
                            <?php if (fncExisteImagen('multi/' . $aryDetalle["sImagenCatalogo"])) : ?>
                                <img style="width:50px; height: 50px; object-fit: contain;" src="<?= strlen($aryDetalle["sImagenCatalogo"]) > 0 ? src('multi/' . $aryDetalle["sImagenCatalogo"]) : "" ?>" alt="" srcset="">
                            <?php endif ?>
                        </td>
                        <td><?= nf($aryDetalle["nCantidad"]) ?></td>
                        <td><?= SIMBOLO_MONEDA . nf($aryDetalle["nPrecio"]) ?></td>
                        <td><?= SIMBOLO_MONEDA . nf($nTotalItem) ?> </td>
                    </tr>
                <?php endforeach ?>

                <?php

                $nIgv       = $nSubtotal * (IGV / 100);
                $nSubtotal  = $nSubtotal - $nIgv;
                $nTotal     = $nSubtotal + $nIgv;

                ?>

                <tr>
                    <td colspan="6">OP. GRAVADAS:</td>
                    <td class="total"><?= SIMBOLO_MONEDA . nf($nSubtotal) ?></td>
                </tr>

                <tr>
                    <td colspan="6">IGV</td>
                    <td class="total"><?= SIMBOLO_MONEDA . nf($nIgv) ?></td>
                </tr>

                <tr>
                    <td colspan="6" class="grand total">TOTAL A PAGAR</td>
                    <td class="grand total"> <?= SIMBOLO_MONEDA . nf($nTotal) ?> </td>
                </tr>
            </tbody>
        </table>

        <div>
            <p>SON : <?= convertir($nTotal) ?></p>
        </div>
        <div id="notices">
            <div class="notice"></div>
        </div>

    </main>
    <footer>
        <?= $aryNegocio["sNombre"] ?> - <?= date("Y") ?>
    </footer>
</body>

</html>