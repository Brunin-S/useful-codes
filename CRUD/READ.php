<?php
    // Aqui incluo o arquivo de conexão
    require_once 'config.php';

    try {
        // Prepara a consulta SQL para selecionar todos os dados da tabela
        $sql = "SELECT * FROM tabela";

        // Prepara e executa a consulta SQL
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Verifica se há resultados
        if ($stmt->rowCount() > 0) {
            // Exibe os dados
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "ID: " . $row['id'] . "<br>";
                echo "Nome: " . $row['nome'] . "<br>";
                echo "Email: " . $row['email'] . "<br>";
                echo "Data: " . $row['data'] . "<br><br>";
            }
        } else {
            echo "Nenhum registro encontrado.";
        }
    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem de erro
        echo "Erro ao ler registros: " . $e->getMessage();
    }
?>
