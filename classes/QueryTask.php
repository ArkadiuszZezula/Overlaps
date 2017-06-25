<?php

/**
 * Query must return a list of all documents required for CPT position
 * for person with NID = 6 that are expired as of 2009-09-01 or there's no data about them.
 * Refer to task 2 for more details.
 */
class QueryTask {
    /**
     * Final query
     * @var string
     */
    public static $yourQuery = "SELECT * FROM req_docs
                                LEFT JOIN pers_docs ON req_docs.doc_nid = pers_docs.doc_nid AND req_docs.pos_id = pers_docs.pos_id
                                WHERE pers_docs.pers_nid IS NULL OR pers_docs.pers_nid = 6
                                AND pers_docs.expires < '2009-09-01'
                                AND req_docs.pos_id = 'CPT'";
}



/* Propozycja refaktoryzacji:
   Utworzenie trzech tabel(lub więcej w zależności od ilości stanowisk i powtarzalności dokumentów dla nich wymaganych).

   Pierwsza tabela zawierająca pers_nid oraz pos_id czyli unikalny numer pracownika oraz zajmowaną pozycję.

   Druga tabela(odzwierciedlająca nazwą stanowisko z pos_id z pierwszej tabeli) zawierająca pierwszą kolumnę pers_nid (generująca ten sam unikalny numer co w pierwszej tabeli)
   oraz kolejne kolumny odzwierciedlające dokumenty wymagane na dane stanowisko (1 dokument=1kolumna).
   Każda z kolumn przyjmowałaby datę ważności złożonego dokumentu lub informację o braku dokumentu w systemie.

   Trzecia tabela identyczna jak druga tabela. Jedynie zmieniona nazwa tabeli na kolejne stanowisko np FO. Zawiera pers_nid oraz kolumny odnoszące się do wymaganych dokumentów.

    W przypadku większej ilości stanowisk kolejne tabele symbolizujące te stanowiska wraz z kolumna pers_nid oraz kolumnami z datą ważności dokumentów.
