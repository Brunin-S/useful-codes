<?php
    // Aqui incluo o arquivo de conexão
    require_once 'config.php';

    // Geralmente na parte do READ tem dois botoes, o editar e o excluir, para pegar o respectivo id deles
    // use esse shorcut do php e pegue o id desejado <?= $row['id']
    // Recupere os dados do formulário ou de onde quer que venham
    $id = $_POST['id']; // Suponha que você tenha o ID do registro a ser atualizado
    $novo_nome = $_POST['novo_nome'];
    $novo_email = $_POST['novo_email'];
    $nova_data = $_POST['nova_data'];

    try {
        // Prepara a consulta SQL para atualizar os dados na tabela
        $sql = "UPDATE tabela SET nome = :novo_nome, email = :novo_email, data = :nova_data WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Faz o binding dos parâmetros
        $stmt->bindParam(':novo_nome', $novo_nome, PDO::PARAM_STR);
        $stmt->bindParam(':novo_email', $novo_email, PDO::PARAM_STR);
        $stmt->bindParam(':nova_data', $nova_data, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a consulta preparada
        $stmt->execute();

        // Verifica se houve sucesso na atualização
        if ($stmt->rowCount() > 0) {
            echo "Registro atualizado com sucesso!";
        } else {
            echo "Nenhum registro foi atualizado. Verifique se o ID é válido.";
        }
    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem de erro
        echo "Erro ao atualizar registro: " . $e->getMessage();
    }
?>
