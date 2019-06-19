# Videoplayer
Dieser Videoplayer wurde, im Rahmen einer Arbeit für die Schule GIBS Solothurn, von Noel Oliveira entwickelt.

Sie dient der Kompetenzerweiterung im Modul 152 von der ICT-Berufsbildung Schweiz. 

Die Applikation wurde mit PHP und mit einem von mir und Dominik Suter entwickelten Template erstellt.

---

## Installationsanleitung
Um das Programm vorerst überhaupt laufen zu lassen, müssen vorgängig einige Parameter in der Konfigurationsdatei von SQL verändert werden, da wir mit grossen Dateien zu tun haben und diese die SQL Limite überschreiten würde.

1. Öffnen Sie XAMPP
2. Öffnen Sie unter MySQL/Konfig die Datei my.ini
3. Ändern Sie untenstehende Werte und speichern sie die Datei
4. Starten Sie den Apache und MySQL Server

	* max_allowed_packet = 1000M
	* innodb_log_file_size = 1000M

Da das Datenbankseeding eine Vorgabe, schlage ich hier 2 verschiedene Methoden vor, um die Datenbank inkl. Daten zu erstellen.

Überprüfen sie in beiden Fällen, dass die Pfade zu ihrem XAMPP Ordner in der SQL Datei korrekt sind, da ansonsten die Applikation nicht richtig funktionieren kann.


###### Methode 1: Über XAMPP Shell
1. Öffnen Sie die Shell Konsole
2. Geben Sie folgenden Befehl ein, um die Datenbank zu erstellen


	* mysql -u root -p < C:\xampp\htdocs\videoplayer\sql\model.sql
	
###### Methode 2: Über phpmyadmin
1. Öffnen Sie phpmyadmin
2. Gehen Sie auf Importieren
3. Klicken Sie auf Datei auswählen und wähle Sie die Datei in ihrem Explorer aus
4. Klicken Sie unten links auf Ok


Anschliessend können Sie die Applikation unter [localhost/videoplayer](http://localhost/videoplayer) starten

---


## Fazit
###### Erreicht
Ich konnte den HTMLPlayer wie verlangt implementieren. Dieser funktioniert ohne jegliche Probleme. Auch auf die Benutzerfreundlichkeit und Gestaltung habe ich Wert gelegt. Ausserdem habe ich 3 Optionen zusätzlich implementiert. Diesen sind das Anzeigen der Views, die Bewertung eines Videos und das automatische abspielen der Videos.
Der Player kann über einen Konstante in der Config verändert werden. Deshalb sind das Anzeigen der Playlists und der einzelnen Videos unabhängig vom Player.

###### Nicht erreicht
-