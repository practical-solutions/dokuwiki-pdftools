# PDF-Tools

This plugin is currently only available in german language. This will be improved in current versions.

## Funktionen
DokuWiki-Plugin, welches zusätzliche Funktionen für dw2pdf bereitstellt. Der Bedarf für diese Funktionen hat sich aus der Praxis im Intranet eines kleinen Unternehmens ergeben, bei der viele Anwender ohne technische Kenntnisse Beiträge schreiben.

### pdf-Tag

    <pdf Vorlagenbezeichnung>
    <pdf Vorlagenbezeichnung quer>

Erzeugt einen Button, um ein PDF mit der ausgewählten Vorlage zu generieren. Dabei handelt es sich um einen Link
* toc = 0 (kein Inhaltsverzeichnis)
* tpl = Vorlagenbezeichnung
* orientation=landscape (wenn "quer" hinter den Vorlagennamen notiert wird)
Aktuell wird eine Abbildung erzeugt, damit kein Text, welches in der Suche relevant ist, in das Dokument generiert wird.

### etikett-Tag

    <etikett>

Wird durch eine Abbildung ersetzt, welches in etwa die Größe eines (Klebe-)Etiketts besitzt. Dies erleichtert die Erstellung von Formularen für einfache Anwender.

## Zusätzliche wrap-container

Ist das wrap-Plugin installiert, so kann man folgende zusätzliche wrap-Klassen verwenden:

    <WRAP maxtabelle>
    Tabelle auf 100% Seitenbreite
    | Inhalt | Noch ein Inhalt |
    </WRAP>
    
    <WRAP formular>
    Tabelle ohne Ränder
    | Beispiel | Okay |
    </WRAP>
	
	<WRAP formular2>
	Tabelle nur mit Rand unterhalb der Zeilen
	| Ein weiteres Beispiel | Test |
	</WRAP>
	
	<WRAP platz>
	Abstände zwischen den Zeilen einer Tabelle
	| Test |
	| Test |
	</WRAP>

    <wrap bigtext>Skaliert den Text auf 115%</wrap>

    <wrap smalltext>Skaliert den Text auf 90%</wrap>

## Abstandshalter für leere Tabellenzellen

    | <abstand1> | Test |
    | <abstand2> | Test |
    | <abstand3> | Test |
  
    | Test | <quer1> | <quer2> | <quer3> |

Diese Tags sind insb. für Tabellen gedacht und sorgen für einen vertikalen Mindestabstand (bei leeren Zeilen).

## Vorlagenpaket

Das pdfTools-Plugin enthält jetzt ein Paket an Vorlagen, welches über den Adminbereich installiert werden können. Im Rahmen des Vorlagenpaket sind zwei Vorlagen-Replacements hinzugefügt worden:
  
    @AUTHOR@ - Name des Autors
    @COMPANY@ - Name des Unternehmens, welches in den Einstellungen festgelegt werden kann.

## Ausblick
Funktionen, welche in kommenden Versionen dazukommen sollen:
* **Erledigt**: Mehrere dw2pdf templates
* **Erledigt**: Eine Anzeige von vorhandenen Templates im Admin-Bereich
* ggf. ein online Vorlageneditor
* Löschen von Vorlagen
* Hochladen von Vorlagen
=======
# PDF-Tools

This plugin is currently only available in german language. This will be improved in current versions.

## Funktionen
DokuWiki-Plugin, welches zusätzliche Funktionen für dw2pdf bereitstellt. Der Bedarf für diese Funktionen hat sich aus der Praxis im Intranet eines kleinen Unternehmens ergeben, bei der viele Anwender ohne technische Kenntnisse Beiträge schreiben.

### pdf-Tag

    <pdf Vorlagenbezeichnung>
    <pdf Vorlagenbezeichnung quer>

Erzeugt einen Button, um ein PDF mit der ausgewählten Vorlage zu generieren. Dabei handelt es sich um einen Link
* toc = 0 (kein Inhaltsverzeichnis)
* tpl = Vorlagenbezeichnung
* orientation=landscape (wenn "quer" hinter den Vorlagennamen notiert wird)
Aktuell wird eine Abbildung erzeugt, damit kein Text, welches in der Suche relevant ist, in das Dokument generiert wird.

### etikett-Tag

    <etikett>

Wird durch eine Abbildung ersetzt, welches in etwa die Größe eines (Klebe-)Etiketts besitzt. Dies erleichtert die Erstellung von Formularen für einfache Anwender.

## Zusätzliche wrap-container

Ist das wrap-Plugin installiert, so kann man folgende zusätzliche wrap-Klassen verwenden:

    <WRAP maxtabelle>
    Tabelle auf 100% Seitenbreite
    | Inhalt | Noch ein Inhalt |
    </WRAP>
    
    <WRAP formular>
    Tabelle ohne Ränder
    | Beispiel | Okay |
    </WRAP>
	
	<WRAP formular2>
	Tabelle nur mit Rand unterhalb der Zeilen
	| Ein weiteres Beispiel | Test |
	</WRAP>
	
	<WRAP platz>
	Abstände zwischen den Zeilen einer Tabelle
	| Test |
	| Test |
	</WRAP>

    <wrap bigtext>Skaliert den Text auf 115%</wrap>

    <wrap smalltext>Skaliert den Text auf 90%</wrap>

## Abstandshalter für leere Tabellenzellen

    | <abstand1> | Test |
    | <abstand2> | Test |
    | <abstand3> | Test |
  
    | Test | <quer1> | <quer2> | <quer3> |

Diese Tags sind insb. für Tabellen gedacht und sorgen für einen vertikalen Mindestabstand (bei leeren Zeilen).

## Vorlagenpaket

Das pdfTools-Plugin enthält jetzt ein Paket an Vorlagen, welches über den Adminbereich installiert werden können. Im Rahmen des Vorlagenpaket sind zwei Vorlagen-Replacements hinzugefügt worden:
  
    @AUTHOR@ - Name des Autors
    @COMPANY@ - Name des Unternehmens, welches in den Einstellungen festgelegt werden kann.

## Ausblick
Funktionen, welche in kommenden Versionen dazukommen sollen:
* Abteilungsspezifisch einstellbar Tags
  * Briefkopftexte, die per Tag in Vorlagen eingebaut werden könnten
  * Abteilungsspezifische @COMPANY@-Tags, die man zentral einstellen könen
* ggf. ein online Vorlageneditor
* Löschen von Vorlagen
* Hochladen von Vorlagen
