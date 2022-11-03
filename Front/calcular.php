<?php
include 'Moto.php';
$cantidadDisponible;
if(isset($_GET["w1"])){
    $cantidadDisponible = $_GET["w1"];
}
    class Subasta{
        private $cantidadDisponible;
        private $participacion;
        private const PAPELERIA = 25000;
        private $seguro;
        private $valorMaximo;

        function __construct($variable1){
            $this->setCantidadDisponible($variable1);
        }
        function getCantidadDisponible(){
            return $this->cantidadDisponible;
        }    
        function setCantidadDisponible($cantidad){
            $this->cantidadDisponible = $cantidad;
        }
        function getParticipacion(){
            return $this->participacion;
        }    
        function setParticipacion(){
            if ($this->cantidadDisponible > 1 && $this->cantidadDisponible <= 100000 ){
                $this->participacion = $this->cantidadDisponible * 0.02 ;
            }else if($this->cantidadDisponible > 100000 && $this->cantidadDisponible < 500000){
                $this->participacion = $this->cantidadDisponible * 0.03;
            }else if($this->cantidadDisponible >= 500000){
                $this->participacion = $this->cantidadDisponible * 0.05; 
            }
        }
        function getPapeleria (){
            echo self::PAPELERIA;
        }
        function getSeguro(){
            return $this->seguro;
        }    
        function setSeguro(){
                $this->seguro = $this->cantidadDisponible * 0.05 ;
        }
        function getValorMaximo(){
            return $this->valorMaximo;
        }    
        function setValorMaximo(){
                $this->valorMaximo = $this->cantidadDisponible - $this->participacion - self::PAPELERIA - $this->seguro;
        }
    }

    $motos = array(
        new Moto("AKT", 2018, 600000),
        new Moto("HONDA", 2017, 550000),
        new Moto("YAMAHA", 2019, 503000),
    );

    $obj =  new Subasta($cantidadDisponible);
    $obj->setParticipacion();
    $obj->setSeguro();
    $obj->setValorMaximo();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Subasta</title>
</head>
<body>
    <div class="container">
        <form>
            <div class="mb-3">
                <label class="label">Cantidad disponible</label>
                <input type="text" class="form-control" value="<?php echo $obj->getCantidadDisponible()?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label">Valor maximo de compra</label>
                <input type="text" class="form-control" value="<?php echo $obj->getValorMaximo(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label">Deducción por participación</label>
                <input type="text" class="form-control" value="<?php echo $obj->getParticipacion(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label">Deducción por papelería</label>
                <input type="text" class="form-control" value="<?php echo $obj->getPapeleria(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="label">Seguro de riesgos</label>
                <input type="text" class="form-control" value="<?php echo $obj->getSeguro(); ?>" readonly>
                <table class="table table-striped response">
                    <thead>
                        <tr>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($motos as $moto){
                        if($moto->getValor()<= $obj->getValorMaximo()){?>
                            <tr>
                                <td><?php  echo $moto->getMarca()?></td>
                                <td><?php  echo $moto->getModelo() ?></td>
                                <td><?php  echo $moto->getValor() ?> </td>
                        </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>
</html>

