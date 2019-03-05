function nav(url) 
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200)
        {
            document.getElementById("main").innerHTML = this.responseText;
            history.pushState(null,null,url);
        }
    };
    
    xhttp.open("GET", url, true);
    xhttp.send(null);
}

$('.reg_btn').live('click',function() {
    nav('registration.html');
});

$('login_btn').live('click', function() {
    nav('login.html');
});