function pushTextToBox() {
    let textArea = document.getElementById("query");
    let message = textArea.value;
    let chatArea = document.getElementById("dialogue-box");
    chatArea.innerHTML += "<div class='query chat'>" + message + "</div>";
    // textArea.value = "";
}