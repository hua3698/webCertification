// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});
function lo(x)
{
	location.replace(x)
}
function op(x,y,url)
{
	//把x淡入顯示，並把url的內容載入到y
	$(x).fadeIn();
	if(y) $(y).fadeIn();
	if(y&&url) $(y).load(url); 
}
function cl(x)
{
	$(x).fadeOut();
}