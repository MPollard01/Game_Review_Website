//create an instance of a HTTP read node.js server
const app = require("http").createServer();
//create an instance of a socket.io server attach it to the node.js server
const io = require("socket.io")(app);

const chatHistory = [];

//create an event handler that monitors new connections
io.on("connection", function (socket) {
	console.log(socket.client.id + " has connected");

	chatHistory.forEach((msg) => {
		socket.emit("server-message", msg);
	});

	//when we recieve a message from the client...
	socket.on("client-message", function (data) {
		console.log("Client message recieved: " + data);
		chatHistory.push(data);
		//send the same message back to the client with a different namespace.
		io.emit("server-message", data);
	});
});

app.listen(3000, function () {
	console.log("server started");
});
