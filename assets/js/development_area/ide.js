/*
  - This is a JS file for the development_area.php page.
*/

//Check connection 
console.log("Hello");

/* ------------------------------------------------------Break Line------------------------------------------------------ */

let editor;

window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/nord_dark");
    editor.session.setMode("ace/mode/c_cpp");
}

function changeLanguage() {

    let language = $("#languages").val();

    if(language == 'c' || language == 'cpp')editor.session.setMode("ace/mode/c_cpp");
    else if(language == 'php')editor.session.setMode("ace/mode/php");
    else if(language == 'python')editor.session.setMode("ace/mode/python");
    else if(language == 'node')editor.session.setMode("ace/mode/javascript");
    else if(language == 'java')editor.session.setMode("ace/mode/java");
}

function executeCode() {

    $.ajax({
        url: "../controllers/app/compiler.php",
        method: "POST",
        data: {
            language: $("#languages").val(),
            code: editor.getSession().getValue()
        },
        success: function(response) {
            if (response.startsWith("PHP Parse error:")) {
                // If response starts with "Error:", display error in red
                $(".output").html(`<span style="color: red;">${response}</span>`);
            } else {
                // Otherwise, display response normally
                $(".output").text(response);
            }
        },
        error: function(xhr, status, error) {
            // Display error message if AJAX request fails
            $(".output").html(`<span style="color: red;">${error}</span>`);
        }
    });
}

const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const chatbox = document.querySelector(".chatbox");
const chatbotToggler = document.querySelector(".chatbot-toggler")
const chatbotCloseBtn = document.querySelector(".close-btn")

let userMessage;
const API_KEY = "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";
const inputInitHeight = chatInput.scrollHeight;

const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", className);
    let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-icons">smart_toy</span><p></p>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("P").textContent = message;
    return chatLi;
}

const generateResponse = (incomingChatLi) => {
    const API_URL = "https://api.openai.com/v1/chat/completions";
    const messageElement = incomingChatLi.querySelector("p");
    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${API_KEY}`
        },
        body: JSON.stringify({
            model: "gpt-3.5-turbo",
            messages: [{ role: "user", content: userMessage }]
        })
    }
    fetch(API_URL, requestOptions).then(res => res.json()).then(data => {
        messageElement.textContent = data.choices[0].message.content;

    }).catch((error) => {
        messageElement.classList.add("error")
        messageElement.textContent = "Oops! Something went wrong. Please try again. ";
    }).finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
}

const handleChat = () => {
    userMessage = chatInput.value.trim();
    if (!userMessage) return;
    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;

    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);

    setTimeout(() => {
        const incomingChatLi = createChatLi("Thinking...", "incoming")
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi);
    }, 600);
}

chatInput.addEventListener("input", () => {
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
    if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleChat();
    }
});

sendChatBtn.addEventListener("click", handleChat);
chatbotCloseBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"))
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"))

/* ------------------------------------------------------Break Line------------------------------------------------------ */