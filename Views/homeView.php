<!doctype html>
<html lang="fr">
<head>
  <?php include("headerView.php"); ?>
  <title>Home</title>
</head>
<body>

<div class="row">
Hello    <?php echo $login ; ?>
</div>
<div class="row">
  <div class="col-md-3">
  Connected Users
  <?php foreach ($users as $user): ?>
    <div class="user" id=<?php echo $user['id'] ?> >
      <?php echo $user['username']; ?>
    </div>
    <hr />
  <?php endforeach; ?>
  </div>
  <div class="col-md-6">
    Messages
    <div userId="0" class="row messages">
      ...
    </div>
    <div class="row">
      <textarea id="msg-to-send" rows="4" cols="50">

      </textarea>
      <div id="send-msg">send</div>
    </div>

  </div>
</div>

<script>
$( document ).ready(function() {
  $(".user").click(function(){
    $('.messages').attr('userId',$(this).attr('id'));
    $.ajax({url: "index.php?controller=Message&action=getByUsersId&userId="+$(this).attr('id'), success: function(result){
        $(".messages").html(result);
    }});
  });

  $("#send-msg").click(function(){
    $.ajax({url: "index.php?controller=Message&action=send&userId="+$('.messages').attr('userId')+"&content="+$('#msg-to-send').val(), success: function(result){
        $(".messages").html(result);
    }});
  });


});
</script>

</body>
</html>
