<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class BasicAuth extends Command
{
    /** @var Filesystem */
    private $filesystem;

    protected $signature = 'auth:basic 
                                {username : username for login}
                                {password : password for this login - default is autogenerated}
                                {--force : overwrite existing .htpasswd file}';

    protected $description = 'Creates a .htpasswd file and prepends the Authorization to your .htaccess file.';

    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();

        $this->filesystem = $filesystem;
    }

    public function handle()
    {
        $this->createPasswordFile();

        $this->prependAuthToHtAccess();

        $this->info('basic auth generated for given credentials.');
    }

    // Create htpasswd in root
    private function createPasswordFile()
    {
        $path = base_path('.htpasswd');

        if ($this->filesystem->exists($path) && false === $this->option('force')) {
            $this->warn('Aborting generation since .htpasswd already exists. Use the --force option to overwrite existing .htpasswd file.');
            exit();
        }

        $password = $this->argument('password');
        $encryptedPassword = crypt($password, base64_encode($password));

        $this->filesystem->put($path, sprintf('%s:%s', $this->argument('username'), $encryptedPassword));
    }

    private function prependAuthToHtAccess()
    {
        $path = public_path('.htaccess');
        $content = file_get_contents($path);

        preg_match('/### BEGIN BASIC AUTH ###(.*)### END BASIC AUTH ###/s', $content, $matches);
        $cleanContent = preg_replace('/### BEGIN BASIC AUTH ###(.*)### END BASIC AUTH ###/s', '', $content);

        $authContent = '### BEGIN BASIC AUTH ###' . PHP_EOL;
        $authContent .= 'AuthType Basic' . PHP_EOL;
        $authContent .= 'AuthName "Staging area"' . PHP_EOL;
        $authContent .= 'AuthUserFile ' . base_path('.htpasswd') . PHP_EOL;
        $authContent .= 'Require valid-user' . PHP_EOL;
        $authContent .= '### END BASIC AUTH ###' . PHP_EOL;

        $this->filesystem->put($path, $authContent . $cleanContent);
    }
}
