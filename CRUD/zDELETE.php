<?php
    // Aqui incluo o arquivo de conexão
    require_once 'config.php';

    // Recupere o ID do registro a ser excluído
    $id = $_POST['id']; // Suponha que você tenha o ID do registro a ser excluído

    try {
        // Prepara a consulta SQL para excluir o registro da tabela
        $sql = "DELETE FROM tabela WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Faz o binding do parâmetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a consulta preparada
        $stmt->execute();

        // Verifica se houve sucesso na exclusão
        if ($stmt->rowCount() > 0) {
            echo "Registro excluído com sucesso!";
        } else {
            echo "Nenhum registro foi excluído. Verifique se o ID é válido.";
        }
    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem de erro
        echo "Erro ao excluir registro: " . $e->getMessage();
    }
?>
