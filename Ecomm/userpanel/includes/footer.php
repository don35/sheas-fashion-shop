    <script src = "userpanel/assets/js/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src = "design/custom.js"></script>
    <script src = "userpanel/assets/js/owl.carousel.min.js"></script>

    <!--ALERTIFY JS-->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
       alertify.set('notifier', 'position', 'top-right');
      <?php 
        if(isset($_SESSION['message']))
      { 
        ?>
        alertify.success('<? $_SESSION['message']; ?>');
        <?php
        unset($_SESSION['message']);
      }
      ?>
    </script>
  </body>
</html>