# Videoplayer
Dieser Videoplayer wurde, im Rahmen einer Arbeit f�r die Schule GIBS Solothurn, von Noel Oliveira entwickelt.

Sie dient der Kompetenzerweiterung im Modul 152 von der ICT-Berufsbildung Schweiz. 

Die Applikation wurde mit PHP und mit einem von mir und Dominik Suter entwickelten Template erstellt.

---

## Installationsanleitung
Um das Programm vorerst �berhaupt laufen zu lassen, m�ssen vorg�ngig einige Parameter in der Konfigurationsdatei von SQL ver�ndert werden, da wir mit grossen Dateien zu tun haben und diese die SQL Limite �berschreiten w�rde.

1. �ffnen Sie XAMPP
2. �ffnen Sie unter MySQL/Konfig die Datei my.ini
3. �ndern Sie untenstehende Werte und speichern sie die Datei
4. Starten Sie den Apache und MySQL Server

	* max_allowed_packet = 1000M
	* innodb_log_file_size = 1000M

Da das Datenbankseeding eine Vorgabe, schlage ich hier 2 verschiedene Methoden vor, um die Datenbank inkl. Daten zu erstellen.

�berpr�fen sie in beiden F�llen, dass die Pfade zu ihrem XAMPP Ordner in der SQL Datei korrekt sind, da ansonsten die Applikation nicht richtig funktionieren kann.


###### Methode 1: �ber XAMPP Shell
1. �ffnen Sie die Shell Konsole
2. Geben Sie folgenden Befehl ein, um die Datenbank zu erstellen


	* mysql -u root -p < C:\xampp\htdocs\videoplayer\sql\model.sql
	
###### Methode 2: �ber phpmyadmin
1. �ffnen Sie phpmyadmin
2. Gehen Sie auf Importieren
3. Klicken Sie auf Datei ausw�hlen und w�hle Sie die Datei in ihrem Explorer aus
4. Klicken Sie unten links auf Ok


Anschliessend k�nnen Sie die Applikation unter [localhost/videoplayer](http://localhost/videoplayer) starten

---


## Fazit
###### Erreicht
Ich konnte den HTMLPlayer wie verlangt implementieren. Dieser funktioniert ohne jegliche Probleme. Auch auf die Benutzerfreundlichkeit und Gestaltung habe ich Wert gelegt. Ausserdem habe ich 3 Optionen zus�tzlich implementiert. Diesen sind das Anzeigen der Views, die Bewertung eines Videos und das automatische abspielen der Videos.
Der Player kann �ber einen Konstante in der Config ver�ndert werden. Deshalb sind das Anzeigen der Playlists und der einzelnen Videos unabh�ngig vom Player.

###### Nicht erreicht
-