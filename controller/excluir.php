<?php
session_start();
include_once '../config/conexao.php';

try {
    $id =filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    $stmt = $conn->prepare("UPDATE usuarios SET status = 'N'  where id = :id ");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $_SESSION['msg'] = "Usuário excluído com sucesso!";
    $_SESSION['status'] = true;
    header("Location: ../listar.php");

}catch (PDOException $e) {
    echo $e->getMessage();
//        $conn->rollBack();
    $_SESSION['msg'] = "Não foi possivel excluír!";
    $_SESSION['status'] = false;
    header("Location: ../listar.php");
}