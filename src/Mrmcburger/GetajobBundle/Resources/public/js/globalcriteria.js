$("#see-button").click(function()
{
    $(location).attr('href', Routing.generate('mrmcburger_getajob_show_global_criteria'));
});

$("#modify-button").click(function()
{
    $(location).attr('href', Routing.generate('mrmcburger_getajob_modify_global_criteria'));
});
