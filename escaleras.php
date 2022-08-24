<?php
//hay un patron, cuando hay mas de 2 escalones en adelante la cantidad de combinaciones es la suma de los dos casos anteriores
function cantCombinaciones($escalones) {
    if ($escalones < 3) //si es menor a 3 simplemente $escalones = $escalones
        return $escalones; 
        $opcion1 = 1; //subir 1 escalon
        $opcion2 = 2; // subir 2 escalones

    for ($i = 2; $i < $escalones; $i++) { //$item = 2 porque el for empezaria cuando $escalones es 3 (para 1 y 2 ya tenemos respuesta)
        $resultado = $opcion1 + $opcion2;
        $opcion1 = $opcion2;
        $opcion2 = $resultado;
    }  
    return $resultado;
  }
/*i=2 2<4?(si) 2+1
res = 1+2 (osea es 3)
1=2 (osea opc1 ahora es 2)
opc2 = res (osea q ahora opc2 es 3)

i=3 3<4?(si) 3+1
res = 2+3 ($res es 5)
2=3 (opc1 ahora es 3)
opc2 = res (osea q ahora opc2 es 5)

i=4 4<4?(NO) corta bucle

una vez cortado el bucle => retorna $resultado
(la funcion cantCombinaciones = retorno de $resultado) */

$escalones = rand(0,1000);

echo "Para $escalones escalones, hay " . cantCombinaciones($escalones) . " combinaciones posibles";

?>
