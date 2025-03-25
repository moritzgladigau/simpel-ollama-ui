# Simpel Ollama UI

**Simpel Ollama UI** ist eine benutzerfreundliche Webanwendung, die es ermöglicht, mit einem Ollama-Modell zu interagieren. Die Benutzeroberfläche besteht aktuell aus einer einfachen Seite, auf der du Text eingeben und an das Modell senden kannst, um Antworten zu erhalten.

## Features

- **Texteingabe:** Du kannst eine Frage oder Anfrage an das Ollama-Modell stellen.
- **Antworten:** Das Modell wird auf deine Eingabe reagieren und eine Antwort zurückgeben.
- **Chat Memory:** Das Modell hat zugriff auf den gesammten vorangegangenen Chat.
  
**Aktuell noch nicht enthalten:**
- Die Möglichkeit, das Modell auszuwählen.
- Die Möglichkeit, mehrere Chat-Verläufe zu führen.

## Installation

1. **Klonen des Repositories:**
   ```bash
   git clone https://github.com/moritzgladigau/simpel-ollama-ui.git
   ```
2. **Wechsel in das Projektverzeichnis:**
   ```bash
   cd simpel-ollama-ui
   ```
3. **Starten der Anwendung**
   
   Du kannst den Webserver mit einem beliebigen Server-Setup starten (z.B. PHP, Node.js, etc.). Falls du PHP verwendest, kannst du die Anwendung lokal mit folgendem Befehl starten:
   ```bash
   php -S localhost:8000
   ```
4.	**Zugriff auf die Anwendung:**

  	Öffne deinen Webbrowser und gehe zu http://localhost:8000.

## TODO
  - [ ] __Docker:__ Ich möchte einen Docker erstellen welcher die gesamte umgebung darstellt.
  - [ ] __Modellauswahl:__ Die Möglichkeit, das Modell auszuwählen, das du ansprechen möchtest.
  - [ ] __Mehrere Chats:__ Unterstützung für mehrere Chat-Verläufe, um unterschiedliche Konversationen parallel zu führen.
