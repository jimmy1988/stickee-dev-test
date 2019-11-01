<?php
  if(isset($_SESSION['messages']) && !empty($_SESSION['messages'])){
?>

  <section id="messages-section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <?php
            if(isset($_SESSION['messages']['success']) && !empty($_SESSION['messages']['success']) && is_array($_SESSION['messages']['success']) && count($_SESSION['messages']['success']) > 0){
          ?>
              <div class="alert alert-success">
                <?php
                  echo "<ul>";
                  for($i=0;$i< count($_SESSION['messages']['success']); $i++){
                    echo "<li>" . $_SESSION['messages']['success'][$i] . "</li>";
                  }
                  echo "</ul>";
                ?>
              </div>
          <?php
            }
          ?>

          <?php
            if(isset($_SESSION['messages']['error']) && !empty($_SESSION['messages']['succerroress']) && is_array($_SESSION['messages']['error']) && count($_SESSION['messages']['error']) > 0){
          ?>
              <div class="alert alert-danger">
                <?php
                  echo "<ul>";
                  for($i=0;$i< count($_SESSION['messages']['error']); $i++){
                    echo "<li>" . $_SESSION['messages']['error'][$i] . "</li>";
                  }
                  echo "</ul>";
                ?>
              </div>
          <?php
            }

            $_SESSION['messages'] = null;
            unset($_SESSION['messages']['success']);
          ?>
        </div>
      </div>
    </div>
  </section>

<?php
}
?>
