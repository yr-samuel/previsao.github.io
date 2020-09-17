<div class="container pesquisar-principal">
        <?php 
            $apikey = "59b34dcc009fbe921ebdf1d5155ce40c";
            $url = "https://api.openweathermap.org/data/2.5/weather?q=".$cidade.",".$estado.",br&appid=".$apikey."&lang=pt_br";
            $resultado = json_decode(file_get_contents($url));

            

            $nomeCidade = ($resultado->name);
            echo strtoupper($nomeCidade);

            $temperatura = ($resultado->main->temp) - 273.0;
            echo "<h1>".$temperatura." ºC</h1>";
            
            $descTempo = (ucwords($resultado->weather[0]->description)) ;
            echo $descTempo;

        ?>
    </div>