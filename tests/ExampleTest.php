<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->connectionsToTransact = ['pgsql'];
        parent::__construct($name, $data, $dataName);
    }

    public function autenticarUsuario()
    {
        $user = factory(App\User::class)->create([
            'api_token' => 'lekinho21',
            'password' => bcrypt('123456')
        ]);

        factory(Laravel\Passport\Client::class)->create([
            'id' => '1',
            'secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
        ]);

        $this->call(
            'POST',
            '/oauth/token',
            [
                'grant_type' => 'password',
                'client_id' => '1',
                'client_secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
                'username' => $user->email,
                'password' => '123456'
            ]
        );

        $token = 'lekinho21';

        factory(Laravel\Passport\Token::class)->create([
            'id' => $token,
            'user_id' => $user->id,
            'client_id' => '1',
            'name' => null,
            'scopes' => '[]',
            'revoked' => false,
            'created_at' => (string) Carbon::now(),
            'updated_at' => (string) Carbon::now(),
            'expires_at' => (string) Carbon::now()->addDay(1),
        ]);
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel');
    }

    public function testAuthSuccess()
    {
        $user = factory(App\User::class)->create([
            'password' => bcrypt('123456')
        ]);

        factory(Laravel\Passport\Client::class)->create([
            'id' => '1',
            'secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
        ]);

        $this->call('POST', '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => '1',
            'client_secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
            'username' => $user->email,
            'password' => '123456'
        ]);

        $this->assertResponseOk();
        $this->seeJsonStructure(["token_type", "expires_in", "access_token", "refresh_token"]);
    }

    public function testAuthFailed()
    {
        $this->call('POST', '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => '1',
            'client_secret' => 'secretDiff',
            'username' => 'fakeemail@test.com',
            'password' => '123456'
        ]);

        $this->seeStatusCode(401);
        $this->seeJsonStructure(["error", "message"]);
    }

    public function testUserFailed()
    {
        $user = factory(App\User::class)->create([
            'password' => bcrypt('123456')
        ]);

        factory(Laravel\Passport\Client::class)->create([
            'id' => '1',
            'secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
        ]);

        $this->call('POST', '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => '1',
            'client_secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
            'username' => $user->email,
            'password' => 'passwordDiff'
        ]);

        $this->seeStatusCode(401);
        $this->seeJsonStructure(["error", "message"]);
    }

    public function testTokenSuccess()
    {
        $user = factory(App\User::class)->create([
            'api_token' => 'lekinho21',
            'password' => bcrypt('123456')
        ]);

        factory(Laravel\Passport\Client::class)->create([
            'id' => '1',
            'secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
        ]);

        $this->call(
            'POST',
            '/oauth/token',
            [
                'grant_type' => 'password',
                'client_id' => '1',
                'client_secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
                'username' => $user->email,
                'password' => '123456'
            ]
        );

        $token = 'lekinho21';

        factory(Laravel\Passport\Token::class)->create([
            'id' => $token,
            'user_id' => $user->id,
            'client_id' => '1',
            'name' => null,
            'scopes' => '[]',
            'revoked' => false,
            'created_at' => (string) Carbon::now(),
            'updated_at' => (string) Carbon::now(),
            'expires_at' => (string) Carbon::now()->addDay(1),
        ]);

        $this->call(
            'GET',
            '/api/user',
            [],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer lekinho21"])
        );

        $this->assertResponseOk();
        $this->seeJsonStructure(["id", "name", "email", "api_token", "created_at", "updated_at"]);

        $this->assertEquals(Auth::guard('api')->user(), User::find(1));
    }

    public function testTokenFailed()
    {
        $user = factory(App\User::class)->create([
            'api_token' => 'lekinho21',
            'password' => bcrypt('123456')
        ]);

        factory(Laravel\Passport\Client::class)->create([
            'id' => '1',
            'secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
        ]);

        $this->call(
            'POST',
            '/oauth/token',
            [
                'grant_type' => 'password',
                'client_id' => '1',
                'client_secret' => 'n8nu57v9hKkNqZb0qjHCsJV9Xuq6GRQuAeiXJTch',
                'username' => $user->email,
                'password' => '123456'
            ]
        );

        $token = 'lekinho21';

        factory(Laravel\Passport\Token::class)->create([
            'id' => $token,
            'user_id' => $user->id,
            'client_id' => '1',
            'name' => null,
            'scopes' => '[]',
            'revoked' => false,
            'created_at' => (string) Carbon::now(),
            'updated_at' => (string) Carbon::now(),
            'expires_at' => (string) Carbon::now()->addDay(1),
        ]);

        $this->call(
            'GET',
            '/api/user',
            [],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer tokkenDiff"])
        );

        $this->seeStatusCode(302);
        $this->assertRedirectedToRoute('login');

        $this->assertEquals(Auth::guard('api')->user(), null);
    }

    public function testListagemAll()
    {
        $this->autenticarUsuario();

        factory(App\Produto::class, 3)->create();
        factory(App\Categoria::class, 3)->create();
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 1,
            'categoria_id' => 4,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 2,
            'categoria_id' => 5,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 3,
            'categoria_id' => 6,
        ]);

        $response = $this->call(
            'GET',
            '/produtos',
            [],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer lekinho21"])
        );

        $this->assertCount(3, json_decode($response->getContent()));
    }

    public function testListagemAllTokenFailed()
    {
        $this->autenticarUsuario();

        factory(App\Produto::class, 3)->create();
        factory(App\Categoria::class, 3)->create();
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 1,
            'categoria_id' => 4,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 2,
            'categoria_id' => 5,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 3,
            'categoria_id' => 6,
        ]);

        $response = $this->call(
            'GET',
            '/produtos',
            [],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer tokenDiff"])
        );

        $this->seeStatusCode(302);
    }

    public function testListagemShow()
    {
        $this->autenticarUsuario();

        factory(App\Produto::class, 3)->create();
        factory(App\Categoria::class, 3)->create();
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 1,
            'categoria_id' => 4,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 2,
            'categoria_id' => 5,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 3,
            'categoria_id' => 6,
        ]);

        $this->call(
            'GET',
            '/produto/1',
            [],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer lekinho21"])
        );

        $this->seeJsonStructure(["id", "nome", "data_fabricacao", "tamanho", "largura", "peso"]);
    }

    public function testListagemShowTokenFailed()
    {
        $this->autenticarUsuario();

        factory(App\Produto::class, 3)->create();
        factory(App\Categoria::class, 3)->create();
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 1,
            'categoria_id' => 4,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 2,
            'categoria_id' => 5,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 3,
            'categoria_id' => 6,
        ]);

        $this->call(
            'GET',
            '/produto/1',
            [],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer tokenDiff"])
        );

        $this->seeStatusCode(302);
    }

    public function testEditProduto()
    {
        $this->autenticarUsuario();

        factory(App\Produto::class, 3)->create();
        factory(App\Categoria::class, 3)->create();
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 1,
            'categoria_id' => 4,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 2,
            'categoria_id' => 5,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 3,
            'categoria_id' => 6,
        ]);

        $request = $this->call(
            'put',
            '/produto/1',
            ['nome' => 'novo nome', 'data_fabricacao' => date("Y-m-d"), 'tamanho' => '1', 'largura' => '1', 'peso' => '1'],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer lekinho21"])
        );

        $this->seeJsonStructure(["nome", "data_fabricacao", "tamanho", "largura", "peso"]);

        $expectedProduto = new \App\Produto();
        $expectedProduto->setRawAttributes(['nome' => 'novo nome', 'data_fabricacao' => date("Y-m-d"), 'tamanho' => '1', 'largura' => '1', 'peso' => '1']);

        $this->assertEquals(json_decode($expectedProduto), json_decode($request->getContent()));
    }

    public function testEditProdutoTokenFailed()
    {
        $this->autenticarUsuario();

        factory(App\Produto::class, 3)->create();
        factory(App\Categoria::class, 3)->create();
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 1,
            'categoria_id' => 4,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 2,
            'categoria_id' => 5,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 3,
            'categoria_id' => 6,
        ]);

        $this->call(
            'put',
            '/produto/1',
            ['nome' => 'novo nome', 'data_fabricacao' => date("Y-m-d"), 'tamanho' => '1', 'largura' => '1', 'peso' => '1'],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer tokenDiff"])
        );

        $this->seeStatusCode(302);
    }

    public function testDeleteProduto()
    {
        $this->autenticarUsuario();

        factory(App\Produto::class, 3)->create();
        factory(App\Categoria::class, 3)->create();
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 1,
            'categoria_id' => 4,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 2,
            'categoria_id' => 5,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 3,
            'categoria_id' => 6,
        ]);

        $this->call(
            'delete',
            '/produto/1',
            [],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer lekinho21"])
        );

        $this->seeJsonStructure(["bool"]);

        $response = $this->call(
            'GET',
            '/produtos',
            [],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer lekinho21"])
        );

        $this->assertCount(2, json_decode($response->getContent()));
    }

    public function testDeleteProdutoTokenFailed()
    {
        $this->autenticarUsuario();

        factory(App\Produto::class, 3)->create();
        factory(App\Categoria::class, 3)->create();
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 1,
            'categoria_id' => 4,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 2,
            'categoria_id' => 5,
        ]);
        factory(App\CategoriaProduto::class)->create([
            'produto_id' => 3,
            'categoria_id' => 6,
        ]);

        $this->call(
            'delete',
            '/produto/1',
            [],
            [],
            [],
            $this->transformHeadersToServerVars(['Authorization' => "Bearer tokenDiff"])
        );

        $this->seeStatusCode(302);
    }
}