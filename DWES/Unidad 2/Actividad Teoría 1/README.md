### Alejandro Priego Izquierdo

1. Script que muestre el mensaje Hola Mundo entrecomillado.

   ```php
   <?php
       echo '"hola mundo"';
   ?>
   ```

2. Ficha personal con los datos cargados en variables. El resultado debe mostrar una foto personal.
   [Ejercicio](../Ejercicio%201/index.php)

3. Script que, a partir del radio almacenado en una variable y la definición de la constante PI, calcule el área del círculo y la longitud de la circunferencia. El debe mostrar valor de radio, longitud de la circunferencia, área del círculo y dibujará un círculo utilizando gráficos vectoriales.

   ```php
   <?php
      $radio = 20;
      $PI = 3.1415;

      echo ('<h2>Radio Circunferencia:'. $radio .'</h2>');
      echo ('<h2>Área Circunferencia: '. ($PI * ($radio ^ 2)) .'</h2>');
      echo ('<h2>Longitud Circunferencia: '. ((2 * $PI) * $radio) .'</h2>');
   ?>
   ```

4. ¿Cuál es la salida del siguiente script?

```php
    <?php
        $ciclo="DAW";
        $modulo="DWES";
        print "<p>";
        printf("%s es un módulo de %d curso de %s", $modulo, 2, $ciclo);
        print "</p>";
    ?>
```

   La salida será "DWES es un móudlo de 2 curso de DAW". %s representa strings y %d números.

Prueba el script y modifícalo para las palabras DAW y DWES apararezcan en negrita.
Investiga uso de print y printf para salida de texto.

```php
    <?php
        $ciclo="DAW";
        $modulo="DWES";
        print "<p>";
        printf("<b> %s </b> es un módulo de %d curso de <b> %s </b>", $modulo, 2, $ciclo);
        print "</p>";
    ?>
```

5. Script que escriba el resultado de la suma de dos números almacenados en dos variables.
   ```php
      <?php
         $n1=1;
         $n2=5;
         
         echo($n1 + $n2)
      ?>
   ```

7. Script que cargue las siguientes variables:
   $x=10;
   $y=7;

   y muestre:
   10 + 7 = 17
   10 - 7 = 3
   10 \* 7 = 70
   10 / 7 = 1.4285714285714
   10 % 7 = 3

   ```php
      <?php
         $n1=10;
         $n2=7;
         
         echo($n1 + $n2)
         echo($n1 - $n2)
         echo($n1 * $n2)
         echo($n1 / $n2)
         echo($n1 % $n2)
      ?>
   ```

1. Escribir un script que declare una variable y muestre la siguiente información en
   pantalla:
   Valor actual 8.
   Suma 2. Valor ahora 10.
   Resta 4. Valor ahora 6.
   Multipica por 5. Valor ahora 30.
   Divide por 3. Valor ahora 10.
   Incrementa el valor en 1. Valor ahora 11.
   Decrementa el valor en 1. Valor ahora 11.

   ```php
      <?php
         $n=8;
         
         echo("Valor actual: ".$n);
         $n += 2;
         echo("Valor ahora: ".$n);
         $n -= 4;
         echo("Valor ahora: ".$n);
         $n *= 5;
         echo("Valor ahora: ".$n);
         $n /= 3;
         echo("Valor ahora: ".$n);
         $n++;
         echo("Valor ahora: ".$n);
         $n--;
         echo("Valor ahora: ".$n);
      ?>
   ```

2. A veces es necesario conocer exactamente el contenido de una variable. Piensa
   como puedes hacer esto y escribe un script con la siguiente salida:
   string(5) “Harry”
   Harry
   int(28)
   NULL

   ```php
      <?php
         $name="Harry";
         $num=28;
         $none = NULL;
         
         echo(gettype($name)."(".strlen($name).') "'.$name.'"');
         echo($name);
         echo(gettype($num)."(".$num.")");
         echo(gettype($none));
      ?>
   ```   

3. Escribir un script que utilizando variables permita obtener el siguiente resultado:
   Valor es string.
   Valor es double.
   Valor es boolean.
   Valor es integer.
   Valor is NULL.

   ```php
      <?php
         $v1="Harry";
         $v2=1.1;
         $v3=true;
         $v4=3;
         $v5=NULL;
         
         echo("Valor es ".gettype($v1));
         echo("Valor es ".gettype($v2));
         echo("Valor es ".gettype($v3));
         echo("Valor es ".gettype($v4));
         echo("Valor es ".gettype($v5));
      ?>
   ```   

   10.Pon ejemplo de uso de la sintaxis heredoc en el manejo de cadenas.

   ```php
      <?php
         $nombre = "Juan";
         $edad = 30;
         $descripcion = <<<EOD
         Hola, mi nombre es $nombre y tengo $edad años.
         Esto es un ejemplo de cómo usar la sintaxis heredoc
         para crear cadenas de texto largas en PHP.
         EOD;

         echo $descripcion;
      ?>
   ```
   