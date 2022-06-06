function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();
}

function signupValidate() {
    var pass = document.getElementById('password').value ;
    var conpass = document.getElementById('repeat-password').value ;
     if (pass == conpass) 
     {
         return true ;
     } 
     else 
     {
         document.getElementById('password').style.borderColor = "#C7001A" ;
         document.getElementById('repeat-password').style.borderColor = "#C7001A" ;
         return false ;
     }  
 }
 var firebaseConfig = {
  apiKey: "AIzaSyDaoYp8ERD_4A9pz6Y-Q4Ez-M7efwmY-Uc",
  authDomain: "chatbox-759eb.firebaseapp.com",
  projectId: "chatbox-759eb",
  storageBucket: "chatbox-759eb.appspot.com",
  messagingSenderId: "12337551751",
  appId: "1:12337551751:web:b2c0eb3f93e291eef11b22",
  measurementId: "G-B36CEX359Y",
  databaseURL: "https://chatbox-759eb-default-rtdb.firebaseio.com/"
};

firebase.initializeApp(firebaseConfig);
var myName = prompt("enter your name");

function sendMessage() {
  // get message
  var message = document.getElementById("message").value;

  // save in database
  firebase.database().ref("messages").push().set({
      "sender": myName,
      "message": message
  });

  // prevent form from submitting
  return false;
}
firebase.database().ref("messages").on("child_added", function (snapshot) {
      var html = "";
      // give each message a unique ID
      html += "<li id='message-" + snapshot.key + "'>";
      // show delete button if message is sent by me
      if (snapshot.val().sender == myName) {
          html += "<button data-id='" + snapshot.key + "' onclick='deleteMessage(this);'>";
              html += "Delete";
          html += "</button>";
      }
      html += snapshot.val().sender + ": " + snapshot.val().message;
      html += "</li>";

      document.getElementById("messages").innerHTML += html;
  });
  function deleteMessage(self) {
    // get message ID
    var messageId = self.getAttribute("data-id");
 
    // delete message
    firebase.database().ref("messages").child(messageId).remove();
}
 
// attach listener for delete message
firebase.database().ref("messages").on("child_removed", function (snapshot) {
    // remove message node
    document.getElementById("message-" + snapshot.key).innerHTML = "This message has been removed";
});

