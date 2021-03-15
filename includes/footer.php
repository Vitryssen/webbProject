
<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Hanterar hur footern ska se ut på varje sida
 -->
<footer id="mainfooter">
            <?php
            if(isset($_SESSION['uname'])){
                echo "<div id = 'FooterUp' onclick='toTop()'></div>";
                echo "<div id = 'FooterDown' onclick='toBottom()'></div>";
            }
            ?>
            <p>By using this site you agree to cookies. Created by André © <?php echo date("Y");?></p>
        </footer><!-- /mainfooter -->
    </div><!-- /container -->
</body>
</html>