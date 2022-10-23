<?php

namespace App\Console;

use App\Console\Message;
use App\Console\Filesystem;

class Command
{
    /**
     * Create a new controller
     * 
     * @param string $name
     * @return void
     */
    public function create_controller($name)
    {
        $controller = fopen("app/Http/Controllers/$name.php", "w") or die(Message::error("Unable to create controller!\n"));
        $controller_content = <<<EOT
<?php

namespace App\Http\Controllers;

class $name
{
    public function index()
    {
        return json(["message" => "Hello World from $name@index"]);
    }
}
EOT;

        fwrite($controller, $controller_content);
        fclose($controller);
        echo Message::success("Controller created successfully!\n");
    }

    /**
     * Create a new model
     * 
     * @param string $name
     * @return void
     */
    public function create_model($name)
    {
        $model = fopen("app/Models/$name.php", "w") or die(Message::error("Unable to create model!\n"));
        $model_content = <<<EOT
<?php

namespace App\Models;

use App\Core\Model;

class $name extends Model
{
    protected \$table = "$name";
}
EOT;

        fwrite($model, $model_content);
        fclose($model);
        echo Message::success("Model created successfully!\n");
    }

    /**
     * Create a new migration
     * 
     * @param string $name
     * @return void
     */
    public function create_migration($name)
    {
        $migration = fopen("app/Migrations/$name.php", "w") or die(Message::error("Unable to create migration!\n"));
        $migration_content = <<<EOT
<?php

namespace App\Migrations;

use App\Core\Migration;

class $name extends Migration
{
    public function up()
    {
        // Create table
        \$this->create("table_name", function (\$table) {
            \$table->increments("id");
            \$table->string("name");
            \$table->timestamps();
        });
    }
}
EOT;

        fwrite($migration, $migration_content);
        fclose($migration);
        echo Message::success("Migration created successfully!\n");
    }

    /**
     * Create a new middleware
     * 
     * @param string $name
     * @return void
     */
    public function create_middleware($name)
    {
        $middleware = fopen("app/Middlewares/$name.php", "w") or die(Message::error("Unable to create middleware!\n"));
        $middleware_content = <<<EOT
<?php

namespace App\Middlewares;

use App\Core\Middleware;

class $name extends Middleware
{
    public function handle()
    {
        // Do something
    }
}
EOT;

        fwrite($middleware, $middleware_content);
        fclose($middleware);
        echo Message::success("Middleware created successfully!\n");
    }

    /**
     * Create a new seeder
     * 
     * @param string $name
     * @return void
     */
    public function create_seeder($name)
    {
        $seed = fopen("app/Seeds/$name.php", "w") or die(Message::error("Unable to create seed!\n"));
        $seed_content = <<<EOT
<?php

namespace App\Seeds;

use App\Core\Seed;

class $name extends Seed
{
    public function run()
    {
        // Do something
    }
}
EOT;

        fwrite($seed, $seed_content);
        fclose($seed);
        echo Message::success("Seed created successfully!\n");
    }

    /**
     * Serve the application
     * 
     * @param string $host
     * @param string $port
     * @param bool $open
     * @return void
     */
    public function serve($host = "localhost", $port = 8000, $open = false)
    {
        echo Message::success("Server started on http://$host:$port\n");
        echo Message::info("Press Ctrl+C to stop the server\n");

        $cmd = "php -S $host:$port -t public";

        if (PHP_OS === "Darwin" && $open) {
            $cmd = "open http://$host:$port && $cmd";
        }

        passthru($cmd);
    }

    public function not_found()
    {
        echo Message::error("Command not found!");
    }
}
