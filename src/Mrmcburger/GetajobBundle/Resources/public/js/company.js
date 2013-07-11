$("#modify-button").click(function()
{
    $(location).attr('href', Routing.generate('mrmcburger_getajob_modify_company', { id: id_company }));
});

$("#see-button").click(function()
{
    $(location).attr('href', Routing.generate('mrmcburger_getajob_show_company', { id: id_company }));
});
