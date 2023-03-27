## KRAVEN

+ Programspråk som får användas är PHP (utan ramverk), Javascript, HTML/CSS
+ Visa alla hemsidor som är publicerade genom applikationen
+ Sidor skall återfinnas i en enkel meny
+ Administratör skall kunna:
    + Loggas in
    + Registera sig
    + Läsa, skapa, editera och ta bort resurs
    + Lösenordet skall vara kryperad innan det lagras i databasen
+ Pages tabellen skall:
    + Ha minst fyra databas-kolumner utöver primary key (t.ex title, content, created_at, site_id)
    + Vara länkad på databasnivå till en användare
    + Hantera markdown (Det fungerar att spara ner det som text och låta klienten parsa markdown till html)
- Besökare skall kunna:
    - Besöka olika sidor t.ex "thewebapp.com?id=about" och "thewebapp.com?id=contact" alternativt med friendly urls 
        "thewebapp.com/page/about" och "thewebapp.com/page/contact"


        -gör att man bara ser sina egna posts på dashboard?