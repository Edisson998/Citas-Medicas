<?php  

if ($_GET) {
    $dato=[
        'id'=>$_GET['id']
    ];
    $sql="UPDATE tblusuario SET estado='I' WHERE id=:id";
    $query=$link->prepare($sql);
    $query->execute($dato);
    $_SESSION['mensaje']="OK";
    header("Location:../../../Vista/Usuarios.php");

    echo $query;
    
?>