
# Portfolio Website
Voor het succesvol draaien van mijn portfolio website zijn de volgende systeemeisen van toepassing:

## Hardware
- Een computer, tablet of mobiele telefoon met minimaal 4 GB RAM en een moderne processor.

## Software
- Een besturingssysteem dat PHP en MySQL ondersteunt, zoals macOS, Windows of Linux.

## Netwerkverbinding
- Een stabiele internetverbinding is vereist voor eventuele externe resources en updates, maar is niet noodzakelijk voor lokaal gebruik.

## Vereisten voor het Lokaal Draaien van de Website
### Geïnstalleerde PHP Server
- Het is vereist dat PHP op de computer is geïnstalleerd om de server te kunnen draaien.

## Voorbereiding
Voordat de website kan worden geïnstalleerd, moeten de volgende stappen worden doorlopen:

### Lokale Server
Je kunt de PHP ingebouwde server gebruiken om de applicatie lokaal te draaien. Dit kan eenvoudig worden gedaan met de volgende stappen:

1. Open een terminal.
2. Navigeer naar de map waarin je projectbestanden zich bevinden.
3. Voer het volgende commando uit om de server te starten:
   ```bash
   php -S localhost:8888
   ```
Hierdoor wordt de PHP-server gestart op poort 8888, en je kunt de applicatie bereiken via [http://localhost:8888](http://localhost:8888) in je webbrowser.

## Databaseconfiguratie
De MySQL-database moet worden aangemaakt met de juiste tabellen en gegevensstructuren zoals beschreven in het datamodel. Gebruik hiervoor een mysqldump-bestand als volgt:

1. Open een terminal of opdrachtprompt.
2. Voer het volgende commando uit om de database te importeren (vervang `path/to/dumpfile.sql` door de juiste waarde):
   ```bash
   mysql -u root -p portfolio < path/to/dumpfile.sql
   ```
   Je wordt vervolgens gevraagd om je wachtwoord in te voeren. Na invoer wordt de database ingericht volgens het mysqldump-bestand.

## Installatiestappen
Om mijn portfolio website te installeren, volg je deze stappen:

1. Open mijn zip-bestand met mijn projectbestanden of download de projectbestanden van mijn GitHub-repository.
2. Plaats de bestanden in de juiste map van de lokale server (bijvoorbeeld de map waarin je de PHP-server draait).
3. Start de lokale server met het eerder genoemde commando.
4. Navigeer naar de locatie waar de website is geplaatst (bijvoorbeeld [http://localhost:8888](http://localhost:8888)).
5. Configureer de database: Voer het mysqldump-commando uit om de database en de benodigde tabellen aan te maken.

## Uitvoering
Na de installatie kan de applicatie worden uitgevoerd door de webbrowser te openen en naar de juiste URL te navigeren. Zorg ervoor dat de lokale server actief is en dat de database correct is ingesteld.

## Admin Panel
Om in te kunnen loggen in mijn Admin panel, gebruik je de volgende username en password:
- username: admin
- password: admin

## Github
Deze portfolio is mijn privé portfolio en is alleen te vinden op:

https://github.com/ninameier1/ADSDY1S1