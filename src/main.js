
// Markdown konfigurieren, damit es sicher verarbeitet wird
marked.setOptions({
    breaks: true,  // `\n` als <br> umwandeln
    gfm: true,  // GitHub Flavored Markdown (GFM) aktivieren
});
async function sendMessage() {
    const inputField = document.getElementById('user-input');
    const message = inputField.value;
    if (!message) return;
    inputField.value = '';

    // Zeige die Eingabe im Chatfenster
    const chatBox = document.getElementById('chat-box');
    chatBox.innerHTML += `<div class="question"><p style="border-bottom: 1px solid #000;">Du:</p><p>${message}</p></div>`;

    // Deaktiviere den Sendebutton
    const sendButton = document.getElementById('send-button');
    sendButton.disabled = true;

    // Ladeanimation einblenden
    const img = document.getElementById('gif');
    img.classList.remove('hidden');
    img.classList.add('visible');

    try {
	const response = await fetch('chat.php', {
	    method: 'POST',
	    headers: { 'Content-Type': 'application/json' },
	    body: JSON.stringify({ message })
	});

	const data = await response.json();
	console.log('Antwort der KI:', data.response);  // Debugging-Ausgabe
	
	// Markdown in sicheres HTML umwandeln
	let formattedText = marked.parse(data.response);

	// Antwort ins Chat-Fenster einfügen
	const responseDiv = document.createElement("div");
	responseDiv.classList.add("response");
	responseDiv.innerHTML = `<p style="border-bottom: 1px solid #000;">Ollama:</p><div>${formattedText}</div>`;

	// Code-Highlighting aktivieren
	responseDiv.querySelectorAll("pre code").forEach((block) => {
	    hljs.highlightElement(block);
	});

	chatBox.appendChild(responseDiv);
    } catch (error) {
	    console.error('Fehler bei der Anfrage:', error);
	    chatBox.innerHTML += `<div class="error"><p style="border-bottom: 1px solid #000; color: red;">Fehler:</p><p style="color: red;">Es gab ein Problem mit der Anfrage. Bitte versuche es später erneut.</p></div>`;
    } finally {
	chatBox.scrollTop = chatBox.scrollHeight;
	
	// MathJax neu rendern, damit LaTeX funktioniert
	if (window.MathJax) {
	    MathJax.typeset();
	}

	// Ladeanimation ausblenden
	img.classList.remove('visible');
	img.classList.add('hidden');

	// Reaktivieren des Sendebuttons
	sendButton.disabled = false;
    }
}
