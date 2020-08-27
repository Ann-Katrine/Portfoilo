/*************************************************/
/*                    GET metodet                */
/*************************************************/
$(document).ready(function(){
    /* billeder */
    $.ajax({
        url: "http://localhost/portfoilo/PHP/indexAdmin.php/api/show/billeder",
        dataType: "json",
        success: function(data){
            let Temp = document.getElementById("listeTingBill");

            data.forEach(function(index){
                let row = document.createElement("div");
                row.className = "liste";
                Temp.appendChild(row);
                
                let div0 = document.createElement("div");
                div0.className = "flex10";
                row.appendChild(div0);
                let div1 = document.createElement("div");
                div1.className = "flex40";
                row.appendChild(div1);
                let div2 = document.createElement("div");
                div2.className = "flex40";
                row.appendChild(div2);
                let div3 = document.createElement("div");
                div3.className = "flex5";
                row.appendChild(div3);
                let div4 = document.createElement("div");
                div4.className = "flex5";
                row.appendChild(div4);
                
                // skal lige tænke om vil have billedet frem
                /*let img = document.createElement("img");
                img.className = "imgSorrelse";
                img.setAttribute("src", index.img);
                img.setAttribute("alt", index.imgTekst);
                div0.appendChild(img);*/

                let sti = document.createElement("p");
                let stien = document.createTextNode(index.img);
                sti.appendChild(stien);
                div1.appendChild(sti);

                let tekst = document.createElement("p");
                let teksten = document.createTextNode(index.imgTekst);
                tekst.appendChild(teksten);
                div2.appendChild(tekst);

                let redigerBt = document.createElement("button");
                div3.appendChild(redigerBt);

                let ikonRediger = document.createElement("ion-icon");
                redigerBt.appendChild(ikonRediger);

                let sletBt = document.createElement("button");
                div4.appendChild(sletBt);

                let ikonSlet = document.createElement("ion-icon");
                sletBt.appendChild(ikonSlet);
            });
            
        },
        error: function(){
            $("#listeTingBill").html("<p>an error has occurred</p>");
        },
        type: "GET"
    }); 
    /* kategori/sprog */
    $.ajax({
        url: "http://localhost/portfoilo/PHP/indexAdmin.php/api/show/kategori",
        dataType: "json",
        success: function(data){
            let Temp = document.getElementById("listeTingKate");

            data.forEach(function(index){
                let row = document.createElement("div");
                row.className = "liste";
                Temp.append(row);

                let div0 = document.createElement("div");
                div0.className = "flex90";
                row.appendChild(div0);
                let div1 = document.createElement("div");
                div1.className = "flex5";
                row.appendChild(div1);
                let div2 = document.createElement("div");
                div2.className = "flex5";
                row.appendChild(div2);

                let tekst = document.createElement("p");
                let teksten = document.createTextNode(index.kategori);
                tekst.appendChild(teksten);
                div0.appendChild(tekst);

                let redigerBt = document.createElement("button");
                div1.appendChild(redigerBt);

                let ikonRediger = document.createElement("ion-icon");
                redigerBt.appendChild(ikonRediger);

                let sletBt = document.createElement("button");
                div2.appendChild(sletBt);

                let ikonSlet = document.createElement("ion-icon");
                sletBt.appendChild(ikonSlet);
            });
        },
        error: function(){
            $("#listeTingKate").html("<p>an error has occurred</p>");
        },
        type: "GET"
    });
    /* type */
    $.ajax({
        url: "http://localhost/portfoilo/PHP/indexAdmin.php/api/show/projekttype",
        dataType: "json",
        success: function(data){
           
            let Temp = document.getElementById("listeTingType");

            data.forEach(function(index){
                 console.log("hej");
                let row = document.createElement("div");
                row.className = "liste";
                Temp.append(row);

                let div0 = document.createElement("div");
                div0.className = "flex90";
                row.appendChild(div0);
                let div1 = document.createElement("div");
                div1.className = "flex5";
                row.appendChild(div1);
                let div2 = document.createElement("div");
                div2.className = "flex5";
                row.appendChild(div2);

                let tekst = document.createElement("p");
                let teksten = document.createTextNode(index.type);
                tekst.appendChild(teksten);
                div0.appendChild(tekst);

                let redigerBt = document.createElement("button");
                div1.appendChild(redigerBt);

                let ikonRediger = document.createElement("ion-icon");
                redigerBt.appendChild(ikonRediger);

                let sletBt = document.createElement("button");
                div2.appendChild(sletBt);

                let ikonSlet = document.createElement("ion-icon");
                sletBt.appendChild(ikonSlet);
            });
        },
        error: function(){
            $("#listeTingType").html("<p>an error has occurred</p>");
        },
        type: "GET"
    });
});

/*************************************************/
/*                    POST metodet               */
/*************************************************/
function postProjekt(){
    $('#postFormProj').click(function(event){ // trigger on form
        
        //validate fiedls if required using jQuery
        var postForm = {
            'Navn'  : $('input[name=Navn]').val(),  // store name fields value
            'Dato'  : $('input[name=Dato]').val(),  // store dato fields value
            'tekst' : $('input[name=tekst]').val()  // store tekst fields value
        };
        
        $.ajax({ // proccess the form using $.ajax()
            type        : 'POST', // method type
            url         : 'http://localhost/portfoilo/PHP/indexAdmin.php/api/create/projekt',
            data        : postForm, // Forms name
            dataType    : 'json',
            success     : function(data){
                //$('#success').fadeIn(1000).append('<p>' + data.posted + '</p>');
            }
        });
        event.preventDefault(); // Prevent the default submit
    });
    $('#projektListe').show();
        $('#opretProjekter').hide();
}

function postType(){
    console.log("virker");
    $('#postFormType').click(function(event){
        // validate fields if required using jQuery
        var postFormType = {
            'typen'  : $('input[name=typen]').val()
        };
        console.log(postFormType);
        $.ajax({
            type         : 'POST',
            url          : 'http://localhost/portfoilo/PHP/indexAdmin.php/api/create/type',
            data         : postFormType,
            datatype     : 'json',
            success      : function(date){
                //$('#success').fadeIn(1000).append('<p>' + data.posted + '</p>');
            }
        });
        event.preventDefault();
    });
    $('#opretType').hide();
    $('#typeListe').show();
}

function postKategori(){
     $('#postFormKateg').click(function(event){
       // validate fields if required using jQuery
        var postFormKateg = {
          'kategorien' : $('input[name=kategorien]').val()  
        };
        
        $.ajax({
            type         : 'POST',
            url          : 'http://localhost/portfoilo/PHP/indexAdmin.php/api/create/kategori',
            data         : postFormKateg,
            datatype     : 'json',
            success      : function(date){
                //$('#success').fadeIn(1000).append('<p>' + data.posted + '</p>');
            }
        });
        event.preventDefault();
    });
    $('#opretKategori').hide();
    $('#kategoriListe').show();
}

function postBilleder(){
     $('#postFormBill').click(function(event){
        // validate fields if required using jQuery
        var postFormBill = {
            'billeder'      : $('input[name=billeder]').val(),
            'beskrivelse'   : $('input[name=beskrivelse]').val()
        };
        
        $.ajax({ 
            type        : 'POST',
            url         : 'http://localhost/portfoilo/PHP/indexAdmin.php/api/create/billeder',
            data        : postFormBill,
            datatype    : 'json',
            success     : function(data){
                //$('#success').fadeIn(1000).append('<p>' + data.posted + '</p>');
            }
        });
        event.preventDefault();
    });
    $('#opretBillede').hide();
    $('#billedListe').show();
    
}

/*************************************************/
/*                    DELETE metodet             */
/*************************************************/


/*************************************************/
/*                    PUT metodet                */
/*************************************************/


/*************************************************/
/*                    PATCH metodet                */
/*************************************************/