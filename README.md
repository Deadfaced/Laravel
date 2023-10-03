# *IMPORTANT*
```
Fazer backup das pastas todas menos "vendor" e "node_modules"
Colar as pastas todas no novo projeto
CMD: composer install e npm install
```

---



# INSTALAR E CRIAR PROJETO LARAVEL

_instala ficheiros necessários para o laravel_
```shell
composer global require laravel/installer
```

_cria um novo projeto vazio em laravel_
```shell
composer create-project --prefer-dist laravel/laravel:^7.0 "nomeProjeto"
```


_**IMPORTANTE**_
```shell
cd "nomeProjeto"
```



_ativa o servidor php no localhost_
```shell
php artisan serve
```

_**WARNING**_: depois disto o cmd fica bloqueado! é preciso abrir um cmd novo dentro da mesma pasta ou através do terminal do IDE (VSCode/PHPStorm)



_acrescenta o UI às dependências do projeto_
```shell
composer require laravel/ui:^2.4
```





_vai instalar o pkg ao qual fizemos download (cria as autenticações - login/register)_
```shell
php artisan ui vue --auth
```




_instalar npm dependencies_
```shell
npm install (ou "npm i")
```



_setup npm packages settings_
```shell
npm run dev
```



_**DENTRO DO XAMPP**_
```shell
- start apache and mysql
- "admin" em mysql
```


_**ABRIR localhost/phpmyadmin**_
```shell
- ir a tab "base de dados"
- create database (letra minuscula)
```




_alterar database name_
```shell
- abrir "newProject\.env <br>
- entre linhas 9-14 mudar DB_DATABASE=laravel para DB_DATABASE=blog
```





_transcreve codigo para sql e cria tabelas_
```shell
php artisan migrate
```





- para reiniciar servidor é preciso ir ao cmd onde está a correr o server e fazer **CTRL+C** para shutdown e voltar a escrever php artisan serve para voltar a ativar




_Seed database_
```shell
php artisan db:seed
```



_Migrate and seed database_ (do it all)
```shell
php artisan migrate:fresh --seed
```

-------------------------------------------------------------------------------------------------------

# CREATE CONTROLLER, MODEL, FACTORY, SEEDER


**WARNING**

antes de criar é preciso apagar tudo o que já existir na pasta `/database/migrations`, apagar tudo menos "DatabaseSeeder" na pasta `/database/seeds`, apagar tudo na pasta `/database/factories` e apagar "User" model na pasta `/app`


_create all_
```shell
php artisan make:model "nameModel" -a
```

>name tem de ser singular e em capital letter


**OR**


_create controller_
```shell
php artisan make:controller "nameController"
```

>name tem de ser singular e em capital letter e incluir a palavra "Controller"


_create model_
```shell
php artisan make:model "nameModel"
```

>name tem de ser singular e em capital letter e incluir a palavra "Model"


_migration_ (create tables)
```shell
php artisan make:migration "nameMigration" --create="nameTable"
```

>`nameMigration` example: create_table_"nameTable" (in which nameTable is plural and in lowercase)

>`--create="nameTable"` example: --create="nameTable" (in which nameTable is plural and in lowercase)



_create seeder_ (insert data into tables)
```shell
php artisan make:seeder "nameSeeder"
```

>name tem de ser singular e em capital letter e incluir a palavra "Seeder"


_create factory_ (create mass data)
```shell
php artisan make:factory "nameFactory"
```

>name tem de ser singular e em capital letter e incluir a palavra "Factory"




-------------------------------------------------------------------------------------------------------




# ROUTES

### CREATE ROUTE
`./routes/web.php`
```php
Route::get('/"nameRoute"', "nameController@nameMethod");
```

nameRoute: nome igual ao do modelo
nameController: nome igual ao do controller



---
# MIGRATIONS

ex: `./database/migrations/2020_12_09_000000_create_users_table.php`
```php
public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
```

---
# SEEDERS

**IMPORTANTE**
em `./database/seeds/DatabaseSeeder.php` é necessário chamar cada seeder que se quer correr
```php	
public function run()
    {
        $this->call(CountrySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BicycleSeeder::class);
    }
```


_inserir dados nas tabelas manualmente_

ex: `./database/seeds/CountrySeeder.php`
```php
public function run()
    {
        \DB::table('countries')->insert([
            'name' => 'Portugal',
        ]);
        \DB::table('countries')->insert([
            'name' => 'Espanha',
        ]);
        \DB::table('countries')->insert([
            'name' => 'França',
        ]);
        \DB::table('countries')->insert([
            'name' => 'Polónia',
        ]);
    }
```



---
# FACTORIES
inserir um certo número de dados nas tabelas automaticamente

Ex:
`./database/factories/UserFactory.php`
```php
$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name(),
        'last_name' => $faker->name(),
        'country_id' => $faker->numberBetween(1, 4),
    ];
});
```
_se quiser inserir por exemplo 100 users acrescentar também_

```php
factory(\App\User::class, 100)->create();
```
em `./database/seeds/UserSeeder.php`


### Caso queira criar _x_ número de bicicletas e associar 2 a cada user 
```php
public function run()
    {
        for($i = 1; $i <= 100; $i++){
            factory(\App\Bicycle::class, 2)->create([
                'user_id' => $i,
            ]);
        }
    }
```	

_por cada iteração de `$i` cria 2 bicicletas e associa ao mesmo user_id_

**ATENÇÃO**

_é necessário já haver (neste caso) bicycles criadas, quer através de seeder quer através de factory, para que se possa associar as bicicletas aos users_

---
# MODELS
fazer relações entre tabelas

Ex:
```shell
class Country extends Model
{
    public function users()
    {
        return $this->hasMany(\App\User::class);
    }
}
```
Keywords:
- hasOne
- hasMany
- belongsTo
- belongsToMany

_(class) Country hasMany (function) users_

---
# CONTROLLERS
Processa os requests da view (enviados através das routes) e interage com o model se necessário. Retorna uma response para a view.

Ex: `./app/Http/Controllers/UserController.php`
```php
public function index()
    {
        $users = \App\User::all();
        return view('user', [
            'users' => $users,
        ]);
    }
```

Outra maneira de representar é retornando a reponse em vez de retornar diretamente a view
```php
public function index()
    {
        $users = \App\User::all();
        return response()->view('user', [
            'users' => $users,
        ]);
    }
```



---
# VIEWS
Representa a página web onde vão ser apresentados os dados

É necessário criar primeiro uma master page (layout) e depois criar as views que vão herdar o layout

Para isso é preciso criar uma pasta _master_ em `./resources/views` e aí criar 3 ficheiros, `header.blade.php`, `main.blade.php` e `footer.blade.php`:

`header.blade.php`
```html
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
</nav>
```

`main.blade.php`
```html	
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Project</title>
    {{-- STYLE SECTION --}}
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" media="all" type="text/css" />
    @yield('styles')
    {{-- .STYLE SECTION --}}
</head>
<body>
    {{-- Header --}}
    @component('master.header')
    @endcomponent
    {{-- .Header --}}

    {{-- Main --}}
    <main>
        @yield('content')
    </main>
    {{-- .Main --}}

    {{-- Footer --}}
    @component('master.footer')
    @endcomponent
    {{-- .Footer --}}

    {{-- SCRIPTS SECTION --}}
    <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
    @yield('scripts')
    {{-- .SCRIPTS SECTION --}}
</body>
</html>
```

`footer.blade.php`
```html
<footer>
    <p align="center">This is a footer</p>
</footer>
``` 

Depois de criado o layout, é preciso criar as views que vão herdar o layout:

Na pasta `./resources/views` criar uma pasta com o nome do controller (ex: `user`) e aí criar um ficheiro `user.blade.php`

Sempre que é criada uma nova view é necessário inserir o seguinte código:
```php
@extends('master.main')

@section('content')

@endsection
```
_`@extends('master.main')` faz com que esta view seja uma extensão do main (que pertence à pasta 'master', daí ser 'master.main')_

_dentro do content vai estar todo o conteúdo da view_

Ex de uma view que mostra todos os users:
```php
@extends('master.main')

@section('content')


<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Country ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Birth Date</th>
      </tr>
    </thead>

    <tbody>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->country->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->birth_date }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>

@endsection
```
_Cria-se uma tabela com bootstrap, e usa-se um **foreach** para percorrer todos os users. Dentro de cada **td** acede-se a cada um dos atributos do user_

---


