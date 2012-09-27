var REFRESH_TIME = 3000;

$(function() {
  $('#MessageAddForm').submit( function() {
  	$.ajax({
  		data:$("#MessageAddForm").serialize(), 
  		dataType:"json", 
  		success:
  			function (data, textStatus) {
  				var message = $("<div>");
  				message.addClass("chat_message").val("message", data.Message.id);
  				message.html("<b>" + data.Message.user + ":</b> " + data.Message.message);
  				$("#messages-appended").append(message);
  				$("#MessageMessage").val(''); //Empty the message text area
  			}, 
  		type:"post", 
  		url:"\/chat\/messages\/add"}
  	);
	return false; //Avoids the form submit
  });

  setTimeout( "refresh()", REFRESH_TIME );

});

function refresh(){
	$.ajax({
  		dataType:"json", 
  		success:
  			function (data, textStatus) {
  				//$("#messages-appended").attr("last-database-message", data.last_message).empty();
  				$(data.messages).each(function(index) {
				    console.log(this);
				});
  				/*var message = $("<div>");
  				message.addClass("chat_message").val("message", data.Message.id);
  				message.html("<b>" + data.Message.user + ":</b> " + data.Message.message);
  				$("#messages-database").append(message);*/
  			}, 
  		type:"get", 
  		url:"\/chat\/messages\/get_latest_messages\/" + $("#messages-appended").attr("last-database-message")}
  	);
	console.log("hello");
	setTimeout( "refresh()", REFRESH_TIME );
}