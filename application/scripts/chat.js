$(document).ready(function () {
	//connect to the socket.io server
	const socket = io.connect("http://localhost:3000");

	//when the form submits...
	$("#form").submit(function (e) {
		e.preventDefault();
		//send a message to the server in the client message namespace
		socket.emit(
			"client-message",
			$("#username").val() + ": " + $("#message").val()
		);
		//reset the input field to blank
		$("#message").val("");
	});
	//when we recieve a message from the server...
	socket.on("server-message", function (data) {
		//add the message to the output area and create a new line
		$("#chatspace").append(data + "<br>");
		console.log(data);
	});
});
