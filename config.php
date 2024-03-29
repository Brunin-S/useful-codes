<?php
// Configurações do banco de dados
$dsn = 'mysql:host=localhost;dbname=new_project;charset=utf8';
$username = 'root';
$password = '';

try {
    // Conectar ao banco de dados usando PDO
    $pdo = new PDO($dsn, $username, $password);

    // Definir o modo de tratamento de erros para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exemplo de consulta SQL
    $sql = "SELECT * FROM login";

    // Preparar a consulta
    $stmt = $pdo->prepare($sql);

    // Executar a consulta
    $stmt->execute();

    // Obter resultados
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Iterar sobre os resultados
    foreach ($results as $row) {
        echo $row['name'] . ' - ' . $row['email'] . '<br>';
    }
} catch (PDOException $e) {
    // Lidar com erros de conexão
    echo 'Erro de conexão: ' . $e->getMessage();
}
?>
