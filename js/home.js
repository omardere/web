function sign_in_clicked(){
    document.getElementById('login').style.display = 'none';
    document.getElementById('signup').style.display = 'none';
    document.getElementById('logout').style.display = 'block';
}
function log_out_clicked(){
    document.getElementById('login').style.display = 'block';
    document.getElementById('signup').style.display = 'block';
    document.getElementById('logout').style.display = 'none';
    document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

}
