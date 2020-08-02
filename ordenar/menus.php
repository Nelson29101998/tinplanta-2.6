<?php

?>
<main>
    <p>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                while ($planta = mysqli_fetch_array($res)) {
                ?>
                    <div class="swiper-slide">
                        <div class="container">
                            <table class="table table-bordered" style="background-color: #fff;">
                                <tbody>
                                    <tr>
                                        <?php
                                        if ($detect->isMobile()) {
                                        ?>
                                            <td class="text-center">
                                            <?php
                                        } else {
                                            ?>
                                            <td rowspan="4" class="text-center">
                                            <?php
                                        }
                                        echo "<img src='" . $planta['Image'] . "' width='200'>";
                                            ?>
                                            </td>
                                            <?php
                                            if ($detect->isMobile()) {
                                            ?>
                                    </tr>
                                    <tr>
                                    <?php
                                            }
                                    ?>
                                    <td>
                                        Nombre de Planta: <?php echo $planta['Nombre']; ?>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tipo de Planta: <?php echo $planta['Tipo_planta']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Época de siembra: <?php echo $planta['Epocaano']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Autor: <?php echo $planta['Autor']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label class="text-justify">Detalle: <?php echo $planta['Detalle']; ?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Tiempo de cosecha: <?php echo $planta['Duracion']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Fecha de creación: <?php echo $planta['Fecha']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    if (isset($_SESSION['Usuario'])) {
                                    ?>
                                        <tr>
                                            <td colspan="2">
                                                <a><button type="button" class="btn btn-yellow"><i class="far fa-star"></i> Favorito</button></a>
                                                <div class="dropdown">
                                                    <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="reportes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Selecciona un problema para continuar<span class="caret"></span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="">Desnudo</a>
                                                        <a class="dropdown-item" href="">Violencia</a>
                                                        <a class="dropdown-item" href="">Acoso</a>
                                                        <a class="dropdown-item" href="">Suicidio o autolesiones</a>
                                                        <a class="dropdown-item" href="">Spam</a>
                                                        <a class="dropdown-item" href="">Incitación al odio</a>
                                                        <a class="dropdown-item" href="">Terorismo</a>
                                                        <a class="dropdown-item" href="">Otro motivo</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </p>
</main>
<?php

?>