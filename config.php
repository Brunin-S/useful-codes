<?php
// Configurações do banco de dados
$dsn = 'mysql:host=localhost;dbname=new_project;charset=utf8';
$username = 'root';
$password = '';

try {
    // Tenta conectar ao banco de dados
    $pdo = new PDO($dsn, $username, $password);

    // Se a conexão for bem-sucedida, exibe mensagem de sucesso
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Se houver um erro, captura a exceção e exibe mensagem de erro
    echo "Erro de conexão: " . $e->getMessage();
}
?>
