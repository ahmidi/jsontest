<?php
/*Ricavo ip */
# $_SERVER['REMOTE_HOST'] <----- contiene l'ip del client che si collega, nel tuo caso sarà sempre il tuo
$ipnumber = $_SERVER['REMOTE_HOST'];

# ma per provare il funzionamento passeremo l'ip in get
$ipnumber = $_GET['ip'];

# ora utilizzeremo l'ip per l'ajax
?>
<html>
<body>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
  body {
    background-color:#333;
  }

  .container{
    max-width:350px;
  }

  h1{
    color: #f5f5f5;
    font-size: 60px;
    font-weight: bold;
    text-shadow: 0 1px 0 #aaa, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
  }

  h2 {
    color: #f5f5f5;
    font-size: 30px;
    font-weight: bold;
    text-shadow: 0 1px 0 #aaa, 0 2px 0 #c9c9c9, 0 3px 0 #bbb;
  }

  input[type=text]{
    color:#fff;
  }

  button{
    width:100%;
  }

  .form-check{
  }

  #result{
    background-color:#fff;
    width:100%;
    padding:20px;
    display:block;
  }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function () {
    $.ajax({
      url: 'https://my-json-server.typicode.com/ahmidi/jsontest/profiles',
      data: 'ip=' + '<?php print $ipnumber?>',
      success: function(response){

        if (response.length > 0)
        {
          var result = "ip:" + response[0].ip +"<br>\
          nome: "+ response[0].nome +"<br>\
          punti: "+ response[0].punti +"\
          ";
          $('#result').html(result);
        }
      },
    });

  });
</script>
<div class="container">
  <div class="row">
    <h1 class="center-align split">Player</h1>
    <h2 class="center-align split"><?php print $ipnumber?></h2>
  </div>
  <div class="row">
    <div class="col s12">
      <div class="form-check">

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <div id="result">

      </div>
    </div>
  </div>
</div>
</body>
</html>
