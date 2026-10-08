# Como a sessão é inicializada

O que acontece no seu fluxo específico?

Analisando o seu arquivo de inicialização (index.php) e o seu AuthController:

1. Antes do Login: Se o usuário acabou de abrir a página de login pela primeira vez, $\_SESSION estará vazia ([]).
2. Durante o Login: O método login() valida os dados, executa o session_regenerate_id(true) (que deleta o arquivo antigo do servidor e muda o ID no navegador, mas mantém os dados da memória) e em seguida injeta os dados:

$_SESSION['auth'] = [
  'email' => $user->email,
  'token' => bin2hex(random_bytes(32)),
];

# Core/Auth

Auth: responde se o usuário está autenticado.

AuthGuard: responde essa rota exige autenticação? Se sim, o usuário está autenticado?

Logout:
  - A ideia é remover somente o estado de autenticação e não destruir a sessão inteira.
  - Porque futuramente sua aplicação pode colocar outras informações na sessão:
    $_SESSION['flash'] = ...;
    $_SESSION['preferences'] = ...;
    $_SESSION['something_else'] = ...;

# Por que salvar apenas o ID na sessão?

A sessão não precisa armazenar os dados do usuário; ela precisa armazenar apenas uma informação que permita identificar o usuário autenticado.

Por que isso é melhor?

Imagine que você armazenasse:

$_SESSION['user'] = [
  'id' => 15,
  'name' => 'Rodrigo',
  'email' => 'rodrigo@email.com',
];

Dados podem ficar desatualizados

A sessão fica responsável por mais informações

A sessão deveria responder principalmente: "Existe um usuário autenticado? Quem é ele?"

E não: "Quais são todos os dados desse usuário?"