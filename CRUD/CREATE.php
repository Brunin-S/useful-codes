<?php
    // Aqui separo alguns dos comandos mais usados para buscas em banco de dados


    //Comando de inserção de dados no banco de dados
            
    // Aqui incluo o arquivo de conexão feito anteriormente, require_once é uma maneira segura de incluir arquivos em PHP, 
    // pois evita a inclusão redundante e ajuda a manter a integridade do código.
    require_once 'config.php';

    // Aqui os dados a serem inseridos, geralmente vindos de um formulario com a propriedade "name" nos inputs por isso
    // os names com o method respectivo do form. Somente adicionar caso tenha mais inputs no seu formulario e mudar o que esta dentro
    // das chaves de acordo com o name.
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $data = $_POST['data'];

    try {
        // Prepara a consulta SQL para inserção
        $sql = "INSERT INTO tabela (nome, email, data) VALUES (:nome, :email, :data)";
        $stmt = $pdo->prepare($sql);

        // Faz o binding dos parâmetros
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':data', $data, PDO::PARAM_STR);

        // Executa a consulta preparada
        $stmt->execute();

        // Exibe mensagem de sucesso
        echo "Registro inserido com sucesso!";
    } catch (PDOException $e) {
        // Em caso de erro, exibe a mensagem de erro
        echo "Erro ao inserir registro: " . $e->getMessage();
    }
?>




    