let editor;

window.onload = function() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/nord_dark");
    editor.session.setMode("ace/mode/c_cpp");
    // nord_dark
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
            $(".output").text(response)
        }
    })
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
    // create a chat <li> element with passed message and className
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
    // send POST request to API, get respone
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

    // Append the useres message to the chatbox
    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);

    setTimeout(() => {
        // display "thinking..." message while waiting for the response
        const incomingChatLi = createChatLi("Thinking...", "incoming")
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi);
    }, 600);
}

chatInput.addEventListener("input", () => {
    // adjust the height of input textarea based on it is content
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
    // if Enter key is pressed without shift key and the window 
    // width is grater then 800px, handle the chat
    if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleChat();
    }
});

sendChatBtn.addEventListener("click", handleChat);
chatbotCloseBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"))
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"))

window.addEventListener('load', function() {
    // Fetch and append the loader content
    fetch('loader.html')
      .then(response => response.text())
      .then(loaderContent => {
        const loaderContainer = document.createElement('div');
        loaderContainer.innerHTML = loaderContent;
        document.body.appendChild(loaderContainer);
  
        // Fade out and remove the loader after the page loads
        loaderContainer.addEventListener('animationend', function() {
          this.remove();
        });
      });
  });