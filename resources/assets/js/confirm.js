(function () {

    $(".delete").on("submit", function(){
        return confirm("Êtes-vous sûr de vouloir effectuer la suppression ?");
    });

})($)