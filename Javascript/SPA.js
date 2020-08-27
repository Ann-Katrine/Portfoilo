/*************************************************/
/*        for hvad skal vises fra starten        */
/*************************************************/
function start(){
    $('#billeder').show(); 
    $('#projeker').hide();
    $('#proType').hide();
    $('#kategori').hide();
    $('#opretBillede').hide();
    $('#billedListe').show();
}

/*************************************************/
/*              for navbarens buttons            */
/*************************************************/
$(document).ready(function(){
    /* billeder */
    $("#bill").click(function(){
        $('#billeder').show();
        $('#projeker').hide();
        $('#proType').hide();
        $('#kategori').hide();
        $('#opretBillede').hide();
        $('#billedListe').show();
    });
    /* projekter */
    $("#proj").click(function(){
        $('#billeder').hide(); 
        $('#projeker').show();
        $('#proType').hide();
        $('#kategori').hide();
        $('#projektListe').show();
        $('#opretProjekter').hide();
    });
    /* typer */
    $("#type").click(function(){
        $('#proType').show(); 
        $('#billeder').hide(); 
        $('#projeker').hide();
        $('#kategori').hide();
        $('#opretType').hide();
        $('#typeListe').show();
    });
    /* kategori*/
    $("#kate").click(function(){
        $('#kategori').show();
        $('#billeder').hide(); 
        $('#projeker').hide();
        $('#proType').hide();
        $('#opretKategori').hide();
        $('#kategoriListe').show();
    });
});

/*************************************************/
/*                for siderne                    */
/*************************************************/
$(document).ready(function(){
    $('#opretBill').click(function(){
        $('#opretBillede').show();
        $('#billedListe').hide();
    });
    /* $('#billListe').click(function(){
        $('#opretBillede').hide();
        $('#billedListe').show();
    });*/
    $('#opretProj').click(function(){
        $('#projektListe').hide();
        $('#opretProjekter').show();
    });
    /*$('#projListe').click(function(){
        $('#projektListe').show();
        $('#opretProjekter').hide();
    });*/
    $('#opretTypen').click(function(){
        $('#opretType').show();
        $('#typeListe').hide();
    });
    /*$('#typenListe').click(function(){
        $('#opretType').hide();
        $('#typeListe').show(); 
    });*/
    $('#opretKate').click(function(){
        $('#opretKategori').show();
        $('#kategoriListe').hide();
    });
    /*$('#kateListe').click(function(){
        $('#opretKategori').hide();
        $('#kategoriListe').show();
    });*/
});







