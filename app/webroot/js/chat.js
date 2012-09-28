var REFRESH_TIME = 3000;

$(function() {
  $('#MessageAddForm').submit( function() {
  	$.ajax({
  		data:$("#MessageAddForm").serialize(), 
  		dataType:"json", 
  		success:
  			function (data, textStatus) {
          addMessage(data.Message, $("#messages-appended"));
  				$("#MessageMessage").val(''); //Empty the message text area
  			}, 
  		type:"post", 
  		url:"\/messages\/add"}
  	);
	return false; //Avoids the form submit
  });

  setTimeout( "refresh()", REFRESH_TIME );

});

function refresh(){
  var messages_appended = $("#messages-appended");
  var current_last_message = messages_appended.attr("last-database-message");
  var room_id = $("#MessageRoomId").val();

	$.ajax({
  		dataType:"json", 
  		success:
  			function (data, textStatus) {
          if(data.last_message != current_last_message){
            messages_appended.attr("last-database-message", data.last_message).empty();
            $(data.messages).each(function(index) {
              addMessage(this.Message, $("#messages-database"));
            });
          }
  			}, 
  		type:"get", 
  		url:"\/messages\/get_latest_messages\/" + current_last_message + "\/" + room_id
  	});
	setTimeout( "refresh()", REFRESH_TIME );
}

function addMessage (message, div){
  var message_div = $("<div>");
  message_div.addClass("chat_message").val("message", message.id);
  message_div.html("<b>" + message.created + " " + message.user + ":</b> " + message.message);
  div.append(message_div);
}