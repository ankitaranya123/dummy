    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url(); ?>assets/dist/js/sb-admin-2.js"></script>
    
    <script src="<?= base_url(); ?>assets/js/notify.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery-ui.min.js"></script>
   
    <?php 
    if(file_exists('./assets/viewjs/'.$this->router->fetch_class().'.js')){
        ?>
         <script src="<?= base_url(); ?>assets/viewjs/<?= $this->router->fetch_class() ?>.js"></script>
    <?php
         }
    ?>
   

</body>

</html>
