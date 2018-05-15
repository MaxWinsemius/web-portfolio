<div class="widget">
    <div class="pageHeader">
      Login
    </div>
    <div class="formSpace"></div>
    <form action="javascript:void(0);">
        <div class="formItem" id="errorMsg" style="display: none">Error: gegevens niet goed ingevuld</div>
        <div class="formItem">
            <input type="text" name="username" placeholder="Gebruikersnaam" maxlength="200">
        </div>
        <div class="formItem">
          <input type="password" name="password" placeholder="Wachtwoord" maxlength="200">
        </div>
      <div class="formItem">
          <input type="submit" name="submit" id="submit" value="Verzenden">
      </div>
    </form>
    <div id="ajaxResponse"></div>
    <script>
      $(document).ready(function() {
        $("#submit").click(function() {
          $.ajax({
            type: "POST",
            url: "login.php",
            data: {
                username: $('[name="username"]').val(),
                password: $('[name="password"]').val(),
                prev: <?= isset($_GET['prev']) ? $_GET['prev'] : 'false' ?>
            }
          })
              .done(function(html) {
                  $("#ajaxResponse").html(html);
              });
        });
      });
    </script>
</div>