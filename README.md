# 📚 BiblioUnife - Sistema Gestionale per Biblioteche

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)

Applicazione web sviluppata in **PHP** e **MySQL** per la gestione informatizzata di una rete di biblioteche universitarie. Il progetto comprende la progettazione completa della base di dati (dal modello concettuale a quello logico) e un'interfaccia frontend per l'interazione con i dati.

## 🛠️ Architettura e Database
Il progetto si distingue per una rigorosa progettazione dei dati:
* **Modello ER:** Definizione delle entità (Libro, Autore, Utente, Succursale, Prestito) e delle loro relazioni.
* **Schema Logico (3NF):** Normalizzazione delle tabelle per evitare ridondanze e garantire l'integrità referenziale.
* I diagrammi sono consultabili direttamente nei file immagine allegati alla repository.

## 🚀 Funzionalità Principali (CRUD & Query)
L'interfaccia web permette di eseguire operazioni avanzate sul database:
* **Gestione Utenti:** Inserimento e visualizzazione dell'anagrafica studenti/utenti.
* **Gestione Prestiti:** Registrazione di nuovi prestiti e restituzioni, con associazione automatica tra matricola, libro e ID della succursale.
* **Motore di Ricerca:** Filtri avanzati per trovare libri tramite Titolo, Nome/Cognome Autore o Anno di pubblicazione.
* **Report e Statistiche:** * Visualizzazione dello storico prestiti di un singolo utente.
  * Monitoraggio dei prestiti attivi filtrati per range di date (o prossimi alla scadenza).
  * Statistiche aggregate: numero di prestiti suddivisi per succursale e numero di libri disponibili per ogni singolo autore.
