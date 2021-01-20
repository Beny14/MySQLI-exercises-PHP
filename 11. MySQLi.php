<?php
// .......... 1 ..........
/*
    Crearea unui obiect cu mysqli new mysqli()
*/
    // $mysqli = new mysqli("localhost", "username", "password", "dbName");
    // if($mysqli->connect_error) die ("Eroare in conectare");
    // $mysqli->close();

/*
    Manipularea datelor real_query()
*/
    // $mysqli->real_query("INSERT INTO utilizatori VALUES (null, 'numele meu')");
    // echo $mysqli->error;

/*
    Pentru citirile buffered utilizăm metoda store_result, în timp ce
    pentru unbuffered utilizăm use_result.
    După ce am extras datele și am poziționat markerul, preluăm rândurile
    în mod secvențial, cu ajutorul variațiilor metodei fetch. Fiecare citire
    cu metoda fetch mută markerul pe poziția următoare (rand).
*/
    // $mysqli->real_query("SELECT * FROM utilizatori");
    // $result = $mysqli->store_result();

    // while($row = $result->fetch_array()){ // fetch_assoc pentru asociativ sau fetch_row pentru numeric.  
    //     echo "Id: " . $row["id"] . " Nume:" . $row["nume"] . "<br>";
    // }

/*
    Atunci când creăm, în locurile unde dorim să introducem
    parametrii în mod dinamic, plasăm un semn de întrebare ?:
*/
    // $stmt = $mysqli->prepare("INSERT INTO utilizatori VALUES (null, ?)");
    // $nume = "Ion";
    // $stmt->bind_param("s", $nume); // Atribuim o valoare prin intermediul metodei bind_param a obiectului statement:
    // $stmt->execute();
    // $stmt->close();

/*
    Intreaga aplicatie arata astfel:
*/
    // $mysqli = new mysqli("localhost", "root", "", "bazaMea");
    // $stmt = $mysqli->prepare("INSERT INTO utilizatori VALUES (null, ?)");
    // $nume = "Ion";
    // $stmt->bind_param("s", $nume);
    // $stmt->execute();
    // $stmt->close();
    // $mysqli->close();

/*
    În afară de securitate, parametrizarea ne permite să executăm
    secvențial câteva interogări, cu diferiți parametri:
*/
    // $nume = array("Mihai", "Sorin", "Ion");
    // foreach($nume as $nume){
    //     $stmt->bind_param("s", $nume);
    //     $stmt->execute();
    // }

/*
    În afară de postări, se mai pot aplica interogările pregătite şi atunci
    când extragem date. De asemenea, foarte eficient:
*/
    // $stmt = $mysqli->prepare("SELECT * FROM utilizatori");
    // $stmt->execute();
    // $stmt->bind_result($id, $nume);

    // while ($stmt->fetch()){
    //     echo "Id: " . $id . " Nume: " . $nume . "<br>";
    // }

/*
    Precum PDO, și MySQLi suportă executarea interogărilor
    tranzacționale. Să recapitulăm: tranzacțiile presupun executarea în
    funcție de sistemul ”totul sau nimic”. Să privim următorul exemplu:
*/
    // $mysqli->autocommit(false); // anumite tranzacții vor fi automat confirmate
    // $mysqli->real_query("INSERT INTO utilizatori VALUES (null, 'Petru')");

    // $mysqli->commit(); // confirmăm sau să revocăm tranzacția
// SAU
    // $mysqli->rollback(); // confirmăm sau să revocăm tranzacția

?>

