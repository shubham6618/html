<html>
<?php
session_start();
if(!isset($_SESSION['u_id'])){
    header('Location:index.php');
}
?>
<head>
<!-- <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
    .conversation-wrap
    {
        box-shadow: -2px 0 3px #ddd;
        padding:0;
        max-height: 400px;
        overflow: auto;
    }
    .conversation
    {
        padding:5px;
        border-bottom:1px solid #ddd;
        margin:0;

    }

    .message-wrap
    {
        box-shadow: 0 0 3px #ddd;
        padding:0;

    }
    .msg
    {
        padding:5px;
        /*border-bottom:1px solid #ddd;*/
        margin:0;
    }
    .msg-wrap
    {
        padding:10px;
        max-height: 400px;
        overflow: auto;

    }

    .time
    {
        color:#bfbfbf;
    }

    .send-wrap
    {
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        padding:10px;
        /*background: #f8f8f8;*/
    }

    .send-message
    {
        resize: none;
    }

    .highlight
    {
        background-color: #f7f7f9;
        border: 1px solid #e1e1e8;
    }

    .send-message-btn
    {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;

        border-bottom-right-radius: 0;
    }
    .btn-panel
    {
        background: #f7f7f9;
    }

    .btn-panel .btn
    {
        color:#b8b8b8;

        transition: 0.2s all ease-in-out;
    }

    .btn-panel .btn:hover
    {
        color:#666;
        background: #f8f8f8;
    }
    .btn-panel .btn:active
    {
        background: #f8f8f8;
        box-shadow: 0 0 1px #ddd;
    }

    .btn-panel-conversation .btn,.btn-panel-msg .btn
    {

        background: #f8f8f8;
    }
    .btn-panel-conversation .btn:first-child
    {
        border-right: 1px solid #ddd;
    }

    .msg-wrap .media-heading
    {
        color:#003bb3;
        font-weight: 700;
    }


    .msg-date
    {
        background: none;
        text-align: center;
        color:#aaa;
        border:none;
        box-shadow: none;
        border-bottom: 1px solid #ddd;
    }


    body::-webkit-scrollbar {
        width: 12px;
    }
 
    
    /* Let's get this party started */
    ::-webkit-scrollbar {
        width: 6px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
/*        -webkit-border-radius: 10px;
        border-radius: 10px;*/
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
/*        -webkit-border-radius: 10px;
        border-radius: 10px;*/
        background:#ddd; 
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    }
    ::-webkit-scrollbar-thumb:window-inactive {
        background: #ddd; 
    }
</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="btn-panel btn-panel-conversation">
                <a href="#" class="btn  col-lg-6 send-message-btn " role="button"><i class="fa fa-search"></i> Search</a>
                <a href="logout.php?id=<?=$_SESSION['u_id']?>" class="btn  col-lg-6  send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> Logout</a>
            </div>
        </div>

        <div class="col-lg-offset-1 col-lg-7">
            <div class="btn-panel btn-panel-msg">

                <a href="#" class="btn  col-lg-3  send-message-btn pull-right" role="button"><i class="fa fa-gears"></i>Hello : <?=$_SESSION['name']?></a>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="conversation-wrap col-lg-3">


            <div class="media conversation">
                <div class="media-body" id="onlineusers">
                    <h4 class="media-heading" >Online Users</h4>                                                    
                </div>
            </div>

        </div>



        <div class="message-wrap col-lg-8">
            <div class="msg-wrap" id="chats">            

            </div>

            <div class="send-wrap">
                <textarea class="form-control send-message" rows="3" placeholder="Write a reply..." id="reply"></textarea>
            </div>
            <div class="btn-panel">
                <input type="submit" name="submit1" value="Send Message" class="btn btn-primary btn-sm pull-right" id="submitchat">
            </div>
        </div>
        <input type="hidden" id="chat_id" >
    </div>
</div>


<script>
    var u_id;
    $(document).ready(function() {
        onlineusers(); // getting online user on page load
        getRecentChats('last'); // getting last chat on page load
        setInterval(onlineusers, 60000); // getting online users every 1 minute
        setInterval(getLiveChat, 5000); // getting live chats every 5 seconds
    });

    
    function onlineusers(){
        $("#onlineusers").empty();
        $.get("getonlineusers.php", function(userlist){
            var list = $.parseJSON(userlist);
            $.each(list, function(index,val) {
                if(val.is_active==1){
                    $("#onlineusers").append('<h4 class="media-heading" >'+val.first_name+'*</h4>');    
                }else{                
                    $("#onlineusers").append('<h5 class="media-heading" >'+val.first_name+'</h5>');    
                }
            });
        });
    }

    function getRecentChats(chatrecord){        
            $.get("getchat.php?chat="+chatrecord, function(chat){ 
                u_id = <?php echo $_SESSION['u_id']?>;               
                var lastchat = $.parseJSON(chat);                  
                if(lastchat.status ==200){
                    if(lastchat.chat.u_id==u_id){
                        $("#chat_id").val(lastchat.chat.id);
                        $("#chats").append('<div class="media msg"><div class="media-body"><h5 class="media-heading">'+lastchat.chat.name+'</h5><small class="col-lg-10">'+lastchat.chat.chat+'</small></div></div>');
                    }else{
                        $("#chats").append('<div class="media msg"><div class="media-body"><h5 class="media-heading">'+lastchat.chat.name+'</h5><small class="col-lg-10">'+lastchat.chat.chat+'</small></div></div>');
                    }
                    $("#chat_id").val(lastchat.chat.id);
                }else{                    
                }
            });    
    }

    function getLiveChat(){
        var chat_id = $("#chat_id").val();             
            u_id = <?php echo $_SESSION['u_id']?>;
         $.get("getchat.php?chat=all&id="+chat_id, function(chat){
                var lastchat = $.parseJSON(chat);
                if(lastchat.status==200){                    
                    $.each(lastchat.chats, function(index,val) { 
                        if(val.u_id == u_id){
                            $("#chats").append('<div class="media msg"><div class="media-body pull-right"><h5 class="media-heading">'+val.name+'</h5><small class="col-lg-10">'+val.chat+'</small></div></div>');
                        }else{
                            $("#chats").append('<div class="media msg"><div class="media-body"><h5 class="media-heading">'+val.name+'</h5><small class="col-lg-10">'+val.chat+'</small></div></div>');
                        }    
                        $("#chat_id").val(val.id);                                                                   
                    });                                    
                }else{
                    console.log(lastchat);        
                }                
            });
    }

        
    $("#submitchat").click(function() {
        var reply = $("#reply").val();
        if(reply != ""){
             $.post("postchat.php", { msg: reply }, function(chat){ 
                var status = $.parseJSON(chat); 
                console.log(status);               
                if(status.status==200){
                    $("#chats").append('<div class="media msg"><div class="media-body"><h5 class="media-heading"><?=$_SESSION['name']?></h5><small class="col-lg-10">'+reply+'</small></div></div>');
                        $("#chat_id").val(status.id);
                        //console.log("Here is you id :"+status.id);
                        $("#reply").val("");
                }
            });
        }
    });
</script>
</body>
</html>
