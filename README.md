# CADASTRO_CARRO7
📘 PROJETO: SISTEMA DE CADASTRO DE VEÍCULOS

🔖 Tema escolhido:
Sistema multiusuário de cadastro de veículos, onde cada usuário pode registrar, visualizar, editar e excluir apenas os veículos que ele mesmo cadastrou. O sistema conta com login seguro, controle de sessões, uso de prepared statements e interface responsiva com Bootstrap.

🧠 Resumo do funcionamento:
- O usuário realiza o cadastro com login, email e senha (criptografada).
- Após login bem-sucedido, ele é redirecionado ao dashboard.
- No dashboard, ele visualiza todos os veículos cadastrados por ele.
- Pode adicionar um novo veículo informando modelo e placa.
- Pode editar ou excluir os veículos que ele mesmo registrou.
- O sistema valida se o usuário está logado antes de permitir qualquer ação.
- Cada veículo está vinculado ao `usuario_id`, garantindo a integridade dos dados.
- Layout moderno e usável com Bootstrap e mensagens de feedback amigáveis.

👤 Usuário de teste:
Login: teste  
Senha: 123 (criptografada, será hash ao cadastrar)  
Ou, você pode cadastrar um novo usuário via `cadastro.php`.

⚙️ Passos para instalação do banco:
1. Abra o XAMPP e inicie o **MySQL** e o **Apache**.
2. Acesse `http://localhost/phpmyadmin`.
3. Crie um novo banco com o nome `sistema_veiculos`.
4. Importe o arquivo localizado em:
