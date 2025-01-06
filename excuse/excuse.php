<?php

if (!isset($_GET["name"]) || !isset($_GET["gender"]) || !isset($_GET["teacher"]) || !isset($_GET["excuse"])) {
    exit(1);
}

$name = $_GET["name"];
$gender = $_GET["gender"];
$teacher = $_GET["teacher"];
$excuse = $_GET["excuse"];

$pronoun = match ($gender) {
    "boy" => "il",
    "girl" => "elle",
    default => "iel"
};

$child = match ($gender) {
    "boy" => "Mon fils, $name, ",
    "girl" => "Ma fille, $name, ",
    default => "Mon enfant, $name, "
};

$reason = match ($excuse) {
    "illness" => "Son état de santé justifie cette absence. Le médecin de famille lui a préconisé une période de repos.",
    "death" => "Un de nos proches est récemment décédé et nous avons besoin de faire notre deuil. J'espère que vous comprendrez notre décision.",
    "activity" => "En raison d'une activité extra-scolaire, $pronoun manquera les cours.",
    "strike" => "Suite aux grèves annoncées, $pronoun ne pourra pas se déplacer jusqu'à l'école."
};

$back = match ($excuse) {
    "illness" => ucfirst($pronoun) . " reviendra dés que son état se sera amélioré.",
    default => ucfirst($pronoun) . " devrait être de retour dés demain."
};

echo <<<END
<article>
Cher monsieur, chère madame $teacher,
<br/><br/>
$child élève en classe de 4ième dans votre collège, ne pourra pas assister au cours aujourd’hui.
<br/>
$reason
<br/><br/>
$back
<br/>
En cas de besoin, vous pouvez me contacter via le numéro que nous avons fourni à l'école.
<br/><br/>
Mes plus sincères salutations.
</article>
END;
?>
