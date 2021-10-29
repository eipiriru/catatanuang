$('#pass-check-modal').click(function()
{
	if ($(this).is(':checked'))
    {
    	$('#pass_modal').attr('type', 'text');
	} 
    else 
    {
    	$('#pass_modal').attr('type', 'password');
	}
});

if (screen.width < 1000) 
{
	$("#nav-menu").removeClass("sticky-top");
}
else
{
	$("#nav-menu").addClass("sticky-top");
}

var page = $("#pagenow").data("page");
nav_aktif(page);

function nav_aktif(page)
{
	$("#"+page+"_nav").removeClass("btn-p-sd");
	$("#"+page+"_nav").addClass("active");
}