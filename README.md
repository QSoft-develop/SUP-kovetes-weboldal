# SUP követés weboldal
A project célja  SUP követés letöltés weboldal fejlesztése és managelése

A jelenlegi weboldal [sup.hu/kov](https://www.sup.hu/kov) ami design tekintetében meglehetősen elmaradott.

**Az új weboldallal kapcsolatos elvárások:**

- kizárólag desktop felületen használatos design, a mostanában elterjedt full-hd felbontásra optomalitálva.

- A jelenlegi weboldalon használt php scriptek megörzése, vagy korszerűsítése. Fontos, hogy a verziókat leíró adatok formátuma és kiolvasása ne változzon. Más szóval az átmeneti időszakban a két felület egyszerre tudjon működni.
  - Az "RegiForraskod" könyvtárban található php segédfüggvények be vannak vonva az új `index.php` oldalba, így továbbra is ugyanazok a verzióinformációk kerülnek kiolvasásra.

- A desig lényege a Microsoft által régebben favorizált "csempés" felület.  
  - Legyen fejléc és logo a régihez hasonló módon, csak szebben.  
  - Legyen lábléc a szokások copyright-nak és néhány linknek a fő weboldalra és a Facebook oldalra.  
  - A középső részen három sorban rendeződnek a csempék. Az első két sorban nagyobb, dupla szélességű csempéken jelenik meg a négy legfontosabb modul (SUP, Raktár, Mérleg, TIP). A harmadik sorban kisebb csempéken láthatók a további modulok és kiegészítő szoftverek (SUP Xls.NET, DbConnector, DbConnector API, QsFdbBackupService, RustDesk, Firebird SQL, WebUpdate).

- A csempék tartalma a fix szöveg mellet a PHP kóddal kiolvasott adatokat tartalmazza. Pontosabban a csempe szöveg csak a modul/szoftver nevét verzió kiadási dátumot.  

- A csempét kiválasztva egy nagyobb doboz jelenik meg a képernyő közepén, ami a kiválasztott modul/szoftver letöltés további részleteit is tartalmazza.  
File neve, Verzió, Feltöltés (kiadás) dátuma, Letöltési méret...  
...és főként a letöltés gomb is itt van.

- A kiválasztott csempe doboza mellé kattintva (vagy Esc gombot nyomva) a letöltés részleteit mutató doboz bezáródik, és visszaáll az alap állapot.

- A weboldal nem használ cookie-kat, ezért ezzel kapcsolatos figyelmeztetés sem szükséges.

Az aktuális verzió a csempés felületet modern, Windows 8/10 "Metro" stílusú megjelenéssel valósítja meg. A csempék színesek, lekerekítettek és reszponzívan rendeződnek rácsba.