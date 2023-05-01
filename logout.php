<?php 
    session_destroy(); 
    echo   
    "<script>
        alert('Logout Success!!!!'); 
        window.location.href='$urluser?page=$home'; 
    </script>"; 
?>