<footer class="footer mt-auto py-3 bg-light">
  <div class="container text-right">
    <span class="text-muted"><a href='https://www.brandmetrics.in/'>@ <a/> Karnataka Vikas Grameena Bank</span>
  </div>
</footer>
<script src="<?php echo base_url();?>assets/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
      $('body').bind('cut copy', function (e) {
          e.preventDefault();
      });
    
      $("body").on("contextmenu",function(e){
        return false;
      }); 
    });
    </script>

  </body>
</html>
