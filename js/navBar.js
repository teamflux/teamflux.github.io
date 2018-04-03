

function addNavBar(selected){
	$('main').prepend(
	'<nav class="grid__col grid__col--7-of-8">'+
	'<a href="index.html"><svg class="logo" xmlns="http://www.w3.org/2000/svg" width="73" height="13" viewBox="0 0 73.2 12.6"><style type="text/css">'+
	'.logoPath{fill:#FFFFFF;}'+
	'</style><path class="logoPath" d="M4.4 5.1h4.8c0.1 0 0.1 0.1 0.1 0.1L8.9 7.5c0 0-0.1 0.1-0.1 0.1H4c-0.1 0-0.1 0-0.1 0.1L3 12.4c0 0-0.1 0.1-0.1 0.1H0.1C0 12.4 0 12.4 0 12.3l1.4-7.2c0 0 0.1-0.1 0.1-0.1L4.4 5.1zM1.9 2.4l0.4-2.3C2.4 0 2.4 0 2.5 0h8.3c0.1 0 0.1 0.1 0.1 0.1l-0.4 2.3c0 0-0.1 0.1-0.1 0.1H4.9L2 2.5C2 2.5 1.9 2.4 1.9 2.4z"/><path class="logoPath" d="M23.7 9.9H29c0.1 0 0.1 0.1 0.1 0.1l-0.4 2.4c0 0-0.1 0.1-0.1 0.1h-8.3c-0.1 0-0.1-0.1-0.1-0.1l2.4-12.2c0 0 0.1-0.1 0.1-0.1h2.8c0.1 0 0.1 0.1 0.1 0.1l-1.9 9.6C23.6 9.8 23.7 9.9 23.7 9.9z"/><path class="logoPath" d="M48.8 0.1l-0.4 2.3c0 0.1 0 0.1 0.1 0.1H51c0.1 0 0.1 0 0.1-0.1l0.4-2.3c0-0.1 0-0.1-0.1-0.1h-2.6C48.8 0 48.8 0 48.8 0.1zM47.3 7.4c-0.4 1.8-1.5 2.7-2.9 2.7 -1.4 0-2.2-0.9-1.8-2.7l1.4-7.3C44.1 0.1 44 0 44 0h-2.6c-0.1 0-0.1 0-0.1 0.1l-1.4 7.3c-0.7 3.5 1.7 5.2 4.3 5.2 3.1 0 5.2-1.4 5.9-5.2l0.4-2.2c0-0.1 0-0.1-0.1-0.1h-2.6c-0.1 0-0.1 0-0.1 0.1L47.3 7.4z"/><path class="logoPath" d="M60.6 12.3L65.2 6c0 0 0-0.1 0-0.1l-2.3-5.7C62.9 0.1 63 0 63 0h2.5c0 0 0.1 0 0.1 0.1l1.4 3.3c0 0.1 0.1 0.1 0.2 0L69.9 0c0 0 0.1 0 0.1 0h3c0.1 0 0.1 0.1 0.1 0.2l-4.8 5.9c0 0 0 0.1 0 0.1l2.8 6.1c0 0.1 0 0.1-0.1 0.1h-2.9c0 0-0.1 0-0.1-0.1l-1.5-3.6c0-0.1-0.1-0.1-0.2 0l-2.7 3.7c0 0-0.1 0-0.1 0h-2.9C60.6 12.4 60.6 12.3 60.6 12.3z"/></svg></a>'+
		'<a href="about.html" class="navItem">About</a>'+
		'<a href="team.html" class="navItem">Team</a>'+
		'<a href="https://fluxteamproject.tumblr.com/" target="_blank" class="navItem">Blog</a>'+
	'</nav>');
	$('.navItem').each(function(){
		if(selected){
			if($(this).text().toLowerCase() == selected.toLowerCase()){
				$(this).addClass('selected');
			}
		}
	});
}