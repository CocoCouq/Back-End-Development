<?php

function calculette_if($nb1, $opt, $nb2)
{
       if ($opt == '*')
        return $nb1*$nb2;
       else if ($opt == '/')
       {
           if ($nb2 != 0)
            return $nb1/$nb2;
           else
            return "Division par 0";

       }
       else if ($opt == '+')
        return $nb1+$nb2;
       else if ($opt == '-')
        return $nb1-$nb2;
       else
        return "Erreur";
}

function calculette_switch($nb1, $opt, $nb2)
{
    switch ($opt) {
        case '*':
            return $nb1*$nb2;
            break;

        case '/':
            if ($nb2 != 0)
                return $nb1/$nb2;
            else
                return "Division par 0";
            break;

        case '+':
            return $nb1+$nb2;
            break;

        case '-':
            return $nb1-$nb2;
            break;

        default:
            break;
    }
}

function calculette_tern($nb1, $opt, $nb2)
{
    $res = $opt == '*'
        ? ($nb1*$nb2)
        : ($opt == '+'
            ? ($nb1+$nb2)
            : ($opt == '-'
                ? ($nb1-$nb2)
                : ($opt == '/'
                    ? ($nb2 != 0
                        ? ($nb1/$nb2)
                        : "Division par 0")
                    : "Erreur" )));
    return $res;
}
?>
