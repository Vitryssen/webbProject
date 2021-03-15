
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