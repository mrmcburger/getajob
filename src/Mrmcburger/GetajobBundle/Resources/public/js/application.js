$("#modify-button").click(function()
{
    $(location).attr('href', Routing.generate('mrmcburger_getajob_modify_application', { id: id_application }));
});

$("#see-button").click(function()
{
    $(location).attr('href', Routing.generate('mrmcburger_getajob_show_application', { id: id_application }));
});
