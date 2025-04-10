# Simpel Ollama UI

**Simpel Ollama UI** ist eine benutzerfreundliche Webanwendung, die es ermöglicht, mit einem Ollama-Modell zu interagieren. Die Benutzeroberfläche besteht aktuell aus einer einfachen Seite, auf der du Text eingeben und an das Modell senden kannst, um Antworten zu erhalten.

## Features

- **Texteingabe:** Du kannst eine Frage oder Anfrage an das Ollama-Modell stellen.
- **Antworten:** Das Modell wird auf deine Eingabe reagieren und eine Antwort zurückgeben.
- **Chat Memory:** Das Modell hat Zugriff auf den gesamten vorangegangenen Chat.

**Aktuell noch nicht enthalten:**

- Die Möglichkeit, das Modell auszuwählen.
- Die Möglichkeit, mehrere Chat-Verläufe zu führen.

## Installation

Das Projekt benötigt einen beliebigen Webserver (z. B. Apache2, httpd, ...) sowie einen PHP-Service zum Laufen. Sollte dies bereits installiert sein, kannst du mit Schritt XX weitermachen.

### Installation auf macOS

1. **Homebrew installieren**

   Die offizielle Anleitung ist [hier](https://brew.sh) zu finden.
   ```bash
   /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
   ```
2. **httpd & PHP einrichten**
   ```bash
   brew install httpd php
   ```
   Öffne die Datei `/opt/homebrew/etc/httpd/httpd.conf` mit deinem bevorzugten Texteditor und aktiviere PHP mit:
   ```apache
   LoadModule php_module /opt/homebrew/opt/php/lib/httpd/modules/libphp.so
   <FilesMatch \.php$>
     SetHandler application/x-httpd-php
   </FilesMatch>
   ```
   Es kann hilfreich sein in der `/opt/homebrew/etc/php/8.4/php.ini` den `max_execution_time` Wert zu erhöhen, da das Ollama-Modell je nach PC länger brauchen kann zu antworten.
3. **Repository klonen:**
   ```bash
   cd /opt/homebrew/var/www
   git clone https://github.com/moritzgladigau/simpel-ollama-ui.git
   ```
4. **Anwendung starten**

   Du kannst den Webserver mit einem beliebigen Server-Setup starten (z. B. PHP, Node.js, etc.). Wenn du httpd und PHP verwendest, kannst du den Service mit
   ```bash
   brew services start httpd php
   brew services list
   ```
   starten und prüfen, ob alles läuft.
5. **Zugriff auf die Anwendung:**

   Öffne deinen Webbrowser und gehe zu [http://localhost:8080/simpel-ollama-ui/src/](http://localhost:8080/simpel-ollama-ui/src/).

### Installation auf Linux
1. **Paketee installieren**

   Je nach Distribution musst du die passenden Pakete installieren. Für Debian/Ubuntu:
   ```bash
   sudo apt update
   sudo apt install apache2 php php-curl git
   ```
   Für Arch Linux:
   ```bash
   sudo pacman -Syu apache php git
   ```

2. **max_execution_time erhöhen**
   
   Falls nötig, kannst du diesen Wert in der PHP-Konfigurationsdatei ändern:
   ```bash
   sudo vim /etc/php/8.4/apache2/php.ini # Debian/Ubuntu
   sudo vim /etc/php.ini # Arch Linux
   ```
   Ändere den Wert von `max_execution_time=30` auf einen höheren Wert.

3. **Repository klonen**
   ```bash
   cd /var/www/html
   sudo git clone https://github.com/moritzgladigau/simpel-ollama-ui.git
   sudo chown -R www-data:www-data simpel-ollama-ui  # Rechte setzen fals nötig
   ```

4. **Apache starten & aktivieen**
   ```bash
   sudo systemctl enable --now apache2  # Debian/Ubuntu
   sudo systemctl enable --now httpd  # Arch Linux
   ```

5. **Zugriff auf die Anwendung**

   Öffne den Browser und gehe zu: http://localhost/simpel-ollama-ui/src/
   
## TODO
  - [ ] __Docker:__ Ich möchte einen Docker erstellen welcher die gesamte umgebung darstellt.
  - [ ] __Modellauswahl:__ Die Möglichkeit, das Modell auszuwählen, das du ansprechen möchtest.
  - [ ] __Mehrere Chats:__ Unterstützung für mehrere Chat-Verläufe, um unterschiedliche Konversationen parallel zu führen.
