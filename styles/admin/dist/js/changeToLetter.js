function Unite(nombre) {
    var unite;
    switch (nombre) {
        case 0:
            unite = "Zero";
            break;
        case 1:
            unite = "One";
            break;
        case 2:
            unite = "Two";
            break;
        case 3:
            unite = "Three";
            break;
        case 4:
            unite = "Four";
            break;
        case 5:
            unite = "Five";
            break;
        case 6:
            unite = "Six";
            break;
        case 7:
            unite = "Seven";
            break;
        case 8:
            unite = "Eight";
            break;
        case 9:
            unite = "Nine";
            break;
    } //fin switch
    return unite;
} //-----------------------------------------------------------------------

function Dizaine(nombre) {
    switch (nombre) {
        case 10:
            dizaine = "Ten";
            break;
        case 11:
            dizaine = "Eleven";
            break;
        case 12:
            dizaine = "Twelve";
            break;
        case 13:
            dizaine = "Thirteen";
            break;
        case 14:
            dizaine = "Fourteen";
            break;
        case 15:
            dizaine = "Fifteen";
            break;
        case 16:
            dizaine = "Sixteen";
            break;
        case 17:
            dizaine = "Seventeen";
            break;
        case 18:
            dizaine = "Eighteen";
            break;
        case 19:
            dizaine = "Nineteen";
            break;
        case 20:
            dizaine = "Twenty";
            break;
        case 30:
            dizaine = "Thirty";
            break;
        case 40:
            dizaine = "Forty";
            break;
        case 50:
            dizaine = "Fifty";
            break;
        case 60:
            dizaine = "Sixty";
            break;
        case 70:
            dizaine = "Seventy";
            break;
        case 80:
            dizaine = "Eighty";
            break;
        case 90:
            dizaine = "Ninety";
            break;
    } //fin switch
    return dizaine;
} //-----------------------------------------------------------------------

function NumberToLetter(nombre) {
    var i, j, n, quotient, reste, nb;
    var ch;
    var numberToLetter = "";
    //__________________________________

    if (nombre.toString().replace(/ /gi, "").length > 15)
        return "dépassement de capacité";
    if (isNaN(nombre.toString().replace(/ /gi, ""))) return "Nombre non valide";

    nb = parseFloat(nombre.toString().replace(/ /gi, ""));
    if (Math.ceil(nb) != nb) return "Nombre avec virgule non géré.";

    n = nb.toString().length;
    switch (n) {
        case 1:
            numberToLetter = Unite(nb);
            break;
        case 2:
            if (nb > 19) {
                quotient = Math.floor(nb / 10);
                reste = nb % 10;
                if (nb < 71 || (nb > 79 && nb < 91)) {
                    if (reste == 0) numberToLetter = Dizaine(quotient * 10);
                    if (reste == 1)
                        numberToLetter = Dizaine(quotient * 10) + Unite(reste);
                    if (reste > 1)
                        numberToLetter = Dizaine(quotient * 10) + Unite(reste);
                } else
                    numberToLetter =
                        Dizaine((quotient - 1) * 10) + Dizaine(10 + reste);
            } else numberToLetter = Dizaine(nb);
            break;
    } //fin switch

    return numberToLetter;
} //-----------------------------------------------------------------------
