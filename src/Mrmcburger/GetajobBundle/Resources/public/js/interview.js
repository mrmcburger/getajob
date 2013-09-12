$('#mrmcburger_getajobbundle_interviewtype_application').change(function ()
{
    var application_id = $( "#mrmcburger_getajobbundle_interviewtype_application" ).val();
    var url = Routing.generate('mrmcburger_getajob_get_interview_address', { applicationId: application_id });
    $.ajax({
       url : url,
       type : 'GET',
       dataType : 'xml',
       success : function(xml, statut)
       {
            $('#mrmcburger_getajobbundle_interviewtype_address_number').val($(xml).find('number').text());
            $('#mrmcburger_getajobbundle_interviewtype_address_type').val($(xml).find('type').text());
            $('#mrmcburger_getajobbundle_interviewtype_address_name').val($(xml).find('name').text());
            $('#mrmcburger_getajobbundle_interviewtype_address_additional').val($(xml).find('additional').text());
            $('#mrmcburger_getajobbundle_interviewtype_address_zip').val($(xml).find('zip').text());
            $('#mrmcburger_getajobbundle_interviewtype_address_city').val($(xml).find('city').text());
       }
    });
});
