$(document).ready(function () {
    $('.reponse').hide();
    $('#commentaire').hide();
    $('.parent').hide();
    addcommentaire();
    addreponse();
});

function addcommentaire() {
    $('#addcommentaire').click(function () {
        $('#commentaire').show();
    });
}

function addreponse() {
    $('button.btnreponse').click(function (self) {
      var idrep =   $(self)["0"].currentTarget.id;
      console.log(idrep);
      $('#rep'+idrep).show();
    });
}



