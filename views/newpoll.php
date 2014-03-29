<div class="container">
    <h2>Luo uusi äänestys</h2>
    <form action="createPoll.php" method="POST">
        Aihe: <input type="text" name="topic"><br>        
        Kuvaus: <br><textarea name="kuvaus"></textarea><br>
        Äänestys päättyy: <input type="text" name="enddate"><br>
        Vaihtoehto 1: <input type="text" name="option1"><br>   
        Vaihtoehto 2: <input type="text" name="option2"><br>  
        Vaihtoehto 3: <input type="text" name="option3"><br>
        <input type="submit" value="Luo äänestys">        
    </form>
</div>

