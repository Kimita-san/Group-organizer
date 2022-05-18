<?php
require_once 'config.php';
require_once 'header.php';

if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id =$id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
    <body style="background: url(images/anime_headphones.jpg); background-size:conver; background-repeat: no-repeat;">
<p>

<div class="w3-container w3-border w3-round-large w3-cyan " style="opacity: 0.8;margin: auto; height: 80px; width: 30%;">
<h1 style="text-align:center; color: white" >Welcome to Z.O.E Chat <?php echo $row["name"]; ?> </h1>
</div>
  </body>
  <div class="w3-card" style="margin:auto; width:50%; height:700px">

      <div class="w3-container">
        <h3>Chat Room</h3>
      </div>
    <div class="w3-container w3-light-gray" id="messages_area" style="width:90%; height: 550px;margin:auto">
      //load chat message history
    </div>
  <form method="post" id="chat_form">
      <textarea class="form-control" id="chat_message" name="chat_message"
      placeholder="Type Message Here" data-parsley-maxlentgh="1000"
        data-parsley-pattern="/^[a-zA-Z0-9\s]+$/" style="resize:none;width:70%" required></textarea>
        <div class="input-group-append">
          <button type="submit" name="send" id="send" class="w3-btn w3-cyan w3-round-large">Send</button>
        </div>
    </div>
    <div id="validation_error">

    </div>
</form>
</div>  //end of card

  <script>

  var conn = new WebSocket('ws://localhost:8080');
  conn.onopen = function(e) {
  console.log("Connection established!");
  };

conn.onmessage = function(e) {
  console.log(e.data);

    var data = JSON.parse(e.data);

    var row_class = 'row justify-content-start';

    var background_class = 'text-dark alert-light';

    var html_data = "<div class='"+row_class+"'><div class='w3-container w3-white'>
    <div style='box-shadow:10px 10px 5px "+background_class+"'>"+data.msg+"
    </div></div></div>";

    $('#messages_area').append(html_data);

    $('#chat_message').val('');
};
$('#chat_form').parsley();

$('#chat_form').on('submit',function(event){
    event.preventDefault();

    if($('#chat_form').parsley().isValid())
    {
        var id = $('id').val();

        var message = $('#chat_message').val();

        var data = {
          UseriD : id,
          msg : message
        };

        conn.send(Json.stringify(data));
    }
  });
  </script>
</html>
