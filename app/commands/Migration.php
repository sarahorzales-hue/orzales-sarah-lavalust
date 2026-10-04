<?php

class MigrationCommand
{
    public static $command = 'migration';

    public static $description = 'Run and manage database migrations';

    public static $arguments = [
        '[action]' => 'Action: run, create-migration, migrate, rollback, rollback-all, refresh, status',
        '[name]'   => 'Migration name used with create-migration'
    ];

    protected static $route_map = [
        'run'           => 'migrate',
        'migrate'       => 'migrate',
        'create-migration' => 'create-migration',
        'rollback'     => 'rollback',
        'rollback-all' => 'rollback-all',
        'refresh'      => 'refresh',
        'status'       => 'status'
    ];

    public function handle($action = null, array $flags = [], array $positional = [])
    {
        $action = $action ?? 'run';

        if (!isset(static::$route_map[$action])) {
            echo "Unknown migration action: \"{$action}\"" . PHP_EOL;
            echo PHP_EOL;
            echo "Available actions:" . PHP_EOL;
            echo "  php lava migration run" . PHP_EOL;
            echo "  php lava migration create-migration <name>" . PHP_EOL;
            echo "  php lava migration migrate" . PHP_EOL;
            echo "  php lava migration status" . PHP_EOL;
            echo "  php lava migration rollback" . PHP_EOL;
            echo "  php lava migration rollback-all" . PHP_EOL;
            echo "  php lava migration refresh" . PHP_EOL;
            exit(1);
        }

        if ($action === 'create-migration') {

            $name = $positional[0] ?? null;

            if (!$name) {
                echo "Migration name is required." . PHP_EOL;
                echo "Example: php lava migration create-migration create_products_table" . PHP_EOL;
                exit(1);
            }

            $route = 'create-migration/' . $name;

        } else {

            $route = static::$route_map[$action];
        }

        $index = PUBLIC_DIR . 'index.php';

        if (!file_exists($index)) {
            echo "index.php not found at: {$index}" . PHP_EOL;
            exit(1);
        }

        $command = sprintf(
            'php %s %s',
            escapeshellarg($index),
            escapeshellarg($route)
        );

        passthru($command);
    }
}