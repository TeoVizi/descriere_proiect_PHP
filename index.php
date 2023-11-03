<!DOCTYPE html>
<html>
<head>
    <title>Descriere proiect PHP</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class = "container">
    <h1>Descrierea proiectului</h1>
    <h2>Tema aleasa: Casa de productie filme</h2>
    <h2>Diagrama Entitate-Relatie:</h2>
    <img class="image" src="diagrama.jpeg" alt="diagrama">
    <h2>Rolul Proiectului:</h2>
    <p>Acest proiect are menirea de a le permite utilizatorilor(regular sau premium) sa vizioneze filme produse de o casa romaneasca. Functionalitati: Autentificare/creare user, posibilitatea unui upgrade la premium, abonatii premium pot face playlist-uri, Userii pot trimite mesaje casei de filme prin formularul de contact, vizionarea de filme prin redirect la alte site-uri(sau eventual prin iframe-uri), posibilitatea abonatilor premium de a lasa recenzii, salvarea in istoric a filmelor deja vizionate.</p>
    <h2>Explicarea atributelor</h2>
    <ul>
    <h3>Utilizatori</h3>
    <ul>
        <li><strong>user_id</strong> (Cheie primară): Integer. Identificator unic pentru fiecare utilizator.</li>
        <li><strong>nume</strong>: Varchar. Numele utilizatorului.</li>
        <li><strong>prenume</strong>: Varchar. Prenumele utilizatorului.</li>
        <li><strong>email</strong>: Varchar. Adresa de email a utilizatorului. Trebuie să fie unică.</li>
        <li><strong>parola</strong>: Varchar. Parola utilizatorului, de obicei stocată criptat.</li>
        <li><strong>tip_abonament</strong>: Varchar. Tipul abonamentului achizitionat de utilizator.</li>
        <li><strong>abonament_start</strong>: Date. Data de inceput al abonamentului.</li>
        <li><strong>abonament_final</strong>: Date. Data de sfarsit al abonamentului.</li>


    </ul>

    <h3>Filme </h3>
    <ul>
        <li><strong>film_id</strong> (Cheie primară): Integer. Identificator unic pentru fiecare film.</li>
        <li><strong>titlu</strong>: Varchar. Titlul filmului.</li>
        <li><strong>durata</strong>: Integer. Durata filmului în minute.</li>
        <li><strong>thumbnail_url</strong>: Varchar. URL-ul pentru poza filmului.</li>
        <li><strong>stream_url</strong>: Varchar. URL pentru vizionarea filmului.</li>


    </ul>

    <h3>Genuri </h3>
    <ul>
        <li><strong>gen_id</strong> (Cheie primară): Integer. Identificator unic pentru fiecare gen.</li>
        <li><strong>nume</strong>: Varchar. Numele genului (e.g., "Acțiune", "Dramă").</li>
    </ul>

    <h3>Genuri_Film (Table asociativ)</h3>
    <ul>
        <li><strong>film_id</strong>(Foreign Key): Integer. Referință la ID-ul filmului.</li>
        <li><strong>gen_id</strong>(Foreign Key): Integer. Referință la ID-ul genului.</li>
    </ul>

    <h3>Istoric</h3>
    <ul>
        <li><strong>user_id</strong>(Foreign Key): Integer. Referință la ID-ul utilizatorului.</li>
        <li><strong>film_id</strong>(Foreign Key): Integer. Referință la ID-ul filmului vizionat.</li>
        <li><strong>vazut_la</strong>: Date. Data când a fost vizionat filmul.</li>
        <li><strong>progres</strong>: Varchar. Pana unde s-a ajuns cu vizionarea filmului.</li>
    </ul>

    <h3>Playlists</h3>
    <ul>
        <li><strong>playlist_id</strong> (Cheie primară): Integer. Identificator unic pentru fiecare playlist.</li>
        <li><strong>user_id</strong>(Foreign Key): Integer. Referință la ID-ul utilizatorului care a creat playlist-ul.</li>
        <li><strong>nume</strong>: Varchar. Numele playlist-ului.</li>
        <li><strong>data-crearii</strong>: Date. Data când a fost creat playlist-ul.</li>

    </ul>

    <h3>Playlist_Film (Table asociativ)</h3>
    <ul>
        <li><strong>playlist_id</strong>(Foreign Key): Integer. Referință la ID-ul playlist-ului.</li>
        <li><strong>film_id</strong>(Foreign Key): Integer. Referință la ID-ul filmului adăugat în playlist.</li>
    </ul>

    <h3>Pareri</h3>
    <ul>
        <li><strong>parere_id</strong> (Cheie primară): Integer. Identificator unic pentru fiecare recenzie.</li>
        <li><strong>user_id</strong>(Foreign Key): Integer. Referință la ID-ul utilizatorului care a scris recenzia.</li>
        <li><strong>film_id</strong>(Foreign Key): Integer. Referință la ID-ul filmului recenzat.</li>
        <li><strong>text</strong>: Text. Conținutul recenziei.</li>
        <li><strong>creat_la</strong>: Date. Data cand a fost adaugata parerea.</li>
    </ul>

    <h3>Plati</h3>
    <ul>
        <li><strong>plata_id</strong> (Cheie primară): Integer. Identificator unic pentru fiecare plată.</li>
        <li><strong>user_id</strong>(Foreign Key): Integer. Referință la ID-ul utilizatorului care a efectuat plata.</li>
        <li><strong>suma</strong>: Float. Suma plătită.</li>
        <li><strong>data</strong>: Datetime. Data și ora efectuării plății.</li>
    </ul>

    <h3>Contact</h3>
    <ul>
        <li><strong>contact_id</strong> (Cheie primară): Integer. Identificator unic pentru fiecare mesaj de contact.</li>
        <li><strong>user_id</strong>(Foreign Key): Integer. Referință la ID-ul utilizatorului care a efectuat plata.</li>
        <li><strong>descriere</strong>: Text. Mesajul in sine.</li>
        <li><strong>data</strong>: Datetime. Data și ora transmiterii mesajului.</li>
    </ul>

    </ul>

    <h2>Explicarea relatiilor:</h2>
    <ul>
        <li><strong>Utilizatori</strong>:
            <ul>
                <li>Are o relatie One-to-Many cu <strong>Istoric</strong>.</li>
                <li>Are o relatie One-to-Many cu <strong>Playlists</strong>.</li>
                <li>Are o relatie One-to-Many cu <strong>Pareri</strong> .</li>
                <li>Are o relatie One-to-Many cu <strong>Plati</strong> .</li>
                <li>Are o relatie One-to-Many cu <strong>Contact</strong> .</li>
            </ul>
        </li>

        <li><strong>Filme</strong> :
            <ul>
                <li>Are o relatie One-to-Many cu <strong>Istoric </strong>.</li>
                <li>Are o relatie Many-to-Many cu <strong>Genuri</strong> prin intermediul tabelului de asociere <strong>Genuri_Film</strong> .</li>
                <li>Are o relatie Many-to-Many cu <strong>Playlists</strong> prin intermediul tabelului de asociere <strong>Playlist_Film</strong> .</li>
                <li>Are o relatie One-to-Many cu <strong>Pareri</strong>.</li>
            </ul>
        </li>

        <li><strong>Genuri</strong>:
            <ul>
                <li>Are o relatie Many-to-Many cu <strong>Filme</strong>prin intermediul tabelului de asociere <strong>Genuri_Film</strong>.</li>
            </ul>
        </li>

        <li><strong>Genuri_Film</strong>:
            <ul>
                <li>Asociaza <strong>Filme</strong> cu <strong>Genuri</strong>.</li>
            </ul>
        </li>

        <li><strong>Istoric </strong>:
            <ul>
                <li>Asociaza <strong>Utilizatori</strong> cu <strong>Filme</strong> pe care le-au vizionat.</li>
            </ul>
        </li>

        <li><strong>Playlists</strong>:
            <ul>
                <li>Are o relatie One-to-Many cu <strong>Playlist_Film</strong> pentru a determina filmele din playlist.</li>
            </ul>
        </li>

        <li><strong>Playlist_Film</strong>:
            <ul>
                <li>Asociaza <strong>Playlists</strong> cu <strong>Filme</strong> incluse in acestea.</li>
            </ul>
        </li>

        <li><strong>Pareri</strong>:
            <ul>
                <li>Asociaza <strong>Utilizatori</strong> cu <strong>Filme</strong> la care au adaugat pareri.</li>
            </ul>
        </li>

        <li><strong>Plati</strong>:
            <ul>
                <li>Asociaza <strong>Utilizatori</strong> cu tranzactiile lor financiare.</li>
            </ul>
        </li>
        <li><strong>Contact</strong>:
            <ul>
                <li>Asociaza <strong>Utilizatori</strong> cu mesajul transmis.</li>
            </ul>
        </li>
    </ul>
    </div>
</body>
</html>
