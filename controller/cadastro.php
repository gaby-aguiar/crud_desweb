<?php
include_once '../config/conexao.php';

    try {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $empty_input = false;

        $dados = array_map('trim', $dados);

        if (in_array('', $dados)) {
            $empty_input = true;
            echo json_encode([
                'msg' => 'Preencha todos os campos!',
                'status' => false
            ]);
        }

        if (!$empty_input) {
            $nome = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
            $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
            $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING);
            $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_STRING);
            $rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_STRING);
            $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_STRING);
            $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_STRING);
            $uf = filter_input(INPUT_POST, "uf", FILTER_SANITIZE_STRING);
            $a = 'A';

            $stmt = $conn->prepare("
                INSERT INTO usuarios (
                    nome,
                    email,
                    cpf,
                    telefone,
                    cep,
                    rua,
                    bairro,
                    cidade,
                    uf,
                    status
                ) VALUES (?,?,?,?,?,?,?,?,?,?)
            ");

            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $cpf);
            $stmt->bindParam(4, $telefone);
            $stmt->bindParam(5, $cep);
            $stmt->bindParam(6, $rua);
            $stmt->bindParam(7, $bairro);
            $stmt->bindParam(8, $cidade);
            $stmt->bindParam(9, $uf);
            $stmt->bindParam(10, $a);

            $stmt->execute();

            echo json_encode([
                'msg' => 'Cadastro realizado com sucesso!',
                'status' => true
            ]);
        }

    }catch (PDOException $e) {
        echo $e->getMessage();
//        $conn->rollBack();
        echo json_encode([
            'msg' => 'Não foi possivel realizar o cadastro',
            'status' => false
        ]);
    }