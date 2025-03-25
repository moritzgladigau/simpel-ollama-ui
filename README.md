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
Das Projekt benöttigt einen belibigen Webserver (z.B. Apache2, httpd,...) so wie einen PHP service zum laufen. Sollte dies bereits installiert sein kann man mit Schritt XX weiter machen.

### Installation on Mac
1. **Installiere Homebrew**
   
   Die offizele anleitung ist [hier](https://brew.sh).
   ```bash
   /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
   ```
2. **Set up httpd & php**
   ```bash
   brew install httpd php
   ```
   öffne die `/opt/homebrew/etc/httpd/httpd.conf` mit deinem bevorzugten text editor und aktiviere php mit:
   ```vim
   LoadModule php_module /opt/homebrew/opt/php/lib/httpd/modules/libphp.so
   <FilesMatch \.php$>
     SetHandler application/x-httpd-php
   </FilesMatch>
   ```
3. **Klonen des Repositories:**
   ```bash
   cd /opt/homebrew/var/www
   git clone https://github.com/moritzgladigau/simpel-ollama-ui.git
   ```
4. **Starten der Anwendung**
   
   Du kannst den Webserver mit einem beliebigen Server-Setup starten (z.B. PHP, Node.js, etc.). Wenn du httpd und php verwendest kannst du den service mit
   ```bash
   brew services start httpd php
   brew services list
   ```
   starten und prüfen ob alles leuft.
4.	**Zugriff auf die Anwendung:**

  	Öffne deinen Webbrowser und gehe zu http://localhost:8080/simpel-ollama-ui/src/.

## TODO
  - [ ] __Docker:__ Ich möchte einen Docker erstellen welcher die gesamte umgebung darstellt.
  - [ ] __Modellauswahl:__ Die Möglichkeit, das Modell auszuwählen, das du ansprechen möchtest.
  - [ ] __Mehrere Chats:__ Unterstützung für mehrere Chat-Verläufe, um unterschiedliche Konversationen parallel zu führen.
