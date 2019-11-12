$(document).ready(function () {
    $("#loginErro").on('hidden.bs.modal', function () {
        document.location.href = '../../../index.php?pagina=View/html/loginF.php';
    });
    
     $("#LoginSucesso").on('hidden.bs.modal', function () {
        document.location.href = '../../../index.php';
    });
    
    
    
});
