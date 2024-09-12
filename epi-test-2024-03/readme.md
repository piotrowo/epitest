# Zadanie

Szablon projektu został skonfigurowany na podstawie [Symfony Starter Kit](https://bitbucket.org/tchojna/docker-symfony-starter-kit/src/master/). W projekcie zostały przygotowane encje `Book`, `Author`, `Genre`, `Publisher` oraz pliki pozwalające na zasilenie bazy danych losowymi danymi.

Przygotuj mechanizm edycji książki (encja `Book`). Wartości encji gatunek (`Genre`), autorów (`Author`), wydawców (`Publisher`) w formularzu edycji `Book` powinny być pobierane z bazy danych. W formularzu edycji, pole pozwalające na wybranie gatunku i wydawcy powinno być listą rozwijaną jednokrotnego wyboru, natomiast pole pozwalające dodać autorów do książki, to pole tekstowe, w którym po przecinku możemy podać wiele imion i nazwisk. W przypadku gdy wprowadzony autor nie istnieje w bazie danych, powinien zostać do niej dodany.

Pamiętaj o walidacji danych, tłumaczeniach, komentarzach. Po zapisaniu rekordu do bazy danych użytkownik powinien zostać przekierowany do podglądu edytowanego rekordu.

## Reguły walidacji

* `title` - pole wymagane o minimalnej długości 3 znaki, a maksymalnej będącej długością pola w bazie danych,
* `totalPages` - pole wymagane, minimalna ilość stron to 20, a maksymalna 3600,
* `publishedDate` - pole wymagane, data publikacji nie mniejsza niż 1750 rok,
* `authors` - lista autorów, każda książka musi mieć minimum jednego autora,
* `genre ` - gatunek, pole wymagane,
* `publisher ` - gatunek, pole wymagane,

## Informacje ogólne
* przesłana praca ma być pracą samodzielną,
* kod zadania ma być zgodny ze składnią zaprezentowaną na zajęciach (podział na klasy, walidacja danych, stosowanie warstwy serwisów, optymalizacja zapytań Doctrine),
* powinien przechodzić poprawnie statyczną analizę kodu zgodnie ze standardem Symfony (w katalogu projektu, w konsoli wystarczy wykonać polecenie `composer static-analysis`),
* proszę pamiętać o uzupełnieniu tłumaczeń,
* wszystkie klasy i metody powinny być poprawnie udokumentowane zgodnie ze standardem _PHPDoc_,
* w odpowiedzi proszę przesłać link do repozytorium _Git_ na adres: **tomasz.chojna@uj.edu.pl**