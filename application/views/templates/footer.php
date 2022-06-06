<style>
    .open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 100px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

#chatspace {
width: 100%;
height: 100px;
overflow: auto;
}

</style>

<button type="button" class="open-button" onclick="openForm()">Chat</button>
<div class="chat-popup" id="myForm">
  <form class="form-container" id="form">
    <h1>Chat</h1>
    <div id="chatspace"></div>
    <input type="hidden" id="username" value="<?php echo $this->session->userdata('userName') ? $this->session->userdata('userName') : 'Unknown User'; ?>"></input>
    <textarea placeholder="Type message.." autocomplete="off" id="message" required></textarea>

    <button type="submit" class="btn" onclick="addMessage()">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
  function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function addMessage() {
  var elem = document.getElementById('chatspace');
  elem.scrollTop = elem.scrollHeight;
}
</script>

</html>