<div class="container pesquisar-dias">
    <?php
        $apikey = "59b34dcc009fbe921ebdf1d5155ce40c";
        $urlDias = "https://api.openweathermap.org/data/2.5/forecast?q=".$cidade.",".$estado.",br&appid=".$apikey."&lang=pt_br";
        $resultadoDias = json_decode(file_get_contents($urlDias));

        $diasemana = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');

            for($i = 0; $i <=39; $i=$i+=8){
                $dia = $resultadoDias->list[$i];
                
                echo "<div class='marg'>";

                    $diaSemanaNumero = date('w', time());

                    $data = ($dia->dt_txt);
                    $diaSemanaNumero = date('w', strtotime($data));
                    echo "<strong>".$diasemana[$diaSemanaNumero]."</strong>";
                    echo "<br>";

                    $temperaturaDias = ($dia->main->temp) - 273.0;
                    echo $temperaturaDias." ºC";
                    echo "<br>";

                    $tempoDias = ucwords(($dia->weather[0]->description));
                    echo $tempoDias;
                    echo "<br>";

                    
                    
                echo "</div>";
            }
    ?>