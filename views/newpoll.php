<div class="container">
    <h2>Luo uusi äänestys</h2>
    <form action="createPoll.php" method="POST">
        Aihe: <input type="text" class="form-control" name="topic" placeholder="Aihe" value="<?php echo $data->poll->getTopic(); ?>"><br>        
        Kuvaus: <br><textarea name="description" class="form-control" placeholder="Kuvaus"><?php echo $data->poll->getDescription(); ?></textarea><br>
        Äänestys päättyy: <input type="text" class="form-control" name="end_date" placeholder="Anna muodossa YYYY-MM-DD" value="<?php echo $data->poll->getEndDate(); ?>"><br>              
        
        Vaihtoehto 1: <input type="text" class="form-control" name="options[]"><br>    
        Vaihtoehto 2: <input type="text" class="form-control" name="options[]"><br>    
        
        <div id="container"></div>
        <a href="#" id="filldetails" onclick="addFields()" class="btn btn-sm">Lisää vaihtoehtoja</a> 
        <input type="text" id="members" name="member" value="" class="input-sm" placeholder="Montako?"><br/><br>        
        <input type="submit" value="Luo äänestys" class="btn btn-primary">
    </form>
</div>

<script>
    function addFields(){
        var number = document.getElementById("members").value;
        var container = document.getElementById("container");
        while (container.hasChildNodes()) {
            container.removeChild(container.lastChild);
        }
        for (i=0;i<number;i++){
            container.appendChild(document.createTextNode("Vaihtoehto " + (i+3)));
            container.appendChild(document.createElement("br"));
            var input = document.createElement("input");
            input.type = "text";
            input.setAttribute('class', 'form-control');
            input.name = "options[]";
            container.appendChild(input);
            container.appendChild(document.createElement("br"));
        }
    }
</script>
