function date_heure(id)
{
        date = new Date;
        annee = date.getFullYear();
        moi = date.getMonth();
        mois = new Array('Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre');
        j = date.getDate();
        jour = date.getDay();
        jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        resultat = 'Nous sommes le '+jours[jour]+' '+j+' '+mois[moi]+' '+annee+' il est '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = resultat;
        setTimeout('date_heure("'+id+'");','1000');
        return true;
}


$("#insert").click(function(){
     $.ajax(
                            {
                                url: '../functions/insert.php',
                                type: 'POST',
                                data: { valider:"go" , nom: $("#nom").val(), description: $("#description2").val(), datedebut: $("#datedebut2").val(), datefin: $("#datefin2").val() },
                                success: function(data)
                                {
                                    location.reload(true);

                                },
                            })
       

})

$("#modif").click(function(){
     $.ajax(
                            {
                                url: '../functions/modifreserv.php',
                                type: 'POST',
                                data: { modifier:"go", titre3: $("#titre3").val(), titre2: $("#titre2").val(), description: $("#description").val(), datedebut: $("#datedebut").val(), datefin: $("#datefin").val() },
                                success: function(data)
                                {
                                    location.reload(true);

                                },
                            })
       

})


$("#effacer").click(function(){
     $.ajax(
                            {
                                url: '../functions/deletereserv.php',
                                type: 'POST',
                                data: { effacer:"go", titre4: $("#titre4").val() },
                                success: function(data)
                                {
                                     location.reload(true);
                                },
                            })
       

})

$(".btnRes").click(function() {
    var id = this["id"];
         $.ajax(
                            {
                                url: '../functions/recupReserv.php',
                                type: 'POST',
                                data: { id :id },

                                success: function(data)
                                {
                                    var resultat=jQuery.parseJSON(data);

                                    $("#titreh1").empty();
                                    $("#titreh1").append(resultat[0][1]);
                                    $("#titre3").val(resultat[0][1]);
                                    $("#titre4").val(resultat[0][1]);
                                    $("#titre2").val(resultat[0][1]);
                                    $("#description").val(resultat[0][2]);

                                    var datedebut = resultat[0][3];
                                    datedebut = datedebut.replace(" ", "T");
                           
                                    $("#datedebut").val(datedebut);

                                    var datefin = resultat[0][4];
                                    datefin = datefin.replace(" ", "T");
                                   
                                    $("#datefin").val(datefin);

                                },
                            })
   
   
})