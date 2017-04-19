<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mockery\CountValidator\Exception;
use App\Models\Teste;

/**
 * Class CacheTest
 * @package App\Console\Commands
 */
class CacheTest extends Command
{
    protected $signature = 'teste:generate';
    protected $description = 'Gera os testes e salva no banco de dados';
    private $tests;

    /**
     * CacheTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Busca o slug
     * @param $file
     * @return mixed
     */
    private function getSlug($file)
    {
        return str_replace('.php', '', $file);
    }

    /**
     * Instancia todos os testes da pasta testes
     * para o array $tests
     */
    private function readTests()
    {
        $_directory = app_path('Testes');
        $dir = dir($_directory);
        while ($file = $dir->read()) {
            if ($file != '.' && $file != '..') {
                try {
                    include_once $_directory . DIRECTORY_SEPARATOR . $file;
                    $classes = get_declared_classes();
                    $class = end($classes);
                    $definition = [
                        'file' => $file,
                        'slug' => $this->getSlug($file),
                        'class' => $class
                    ];
                    $this->tests[] = (object)$definition;
                } catch (Exception $e) {
                    $this->warn("Nenhum teste encontrado no arquivo: {$file}");
                    $this->warn('Mensagem de erro: ' . $e->getMessage());
                }
            }
        }
        $dir->close();
    }

    /**
     * Insere um novo teste na base de dados ou atualiza
     * @param $test
     */
    private function insertNewTest($test)
    {
        $new = Teste::firstOrNew(['slug' => $test->slug]);
        $instance = new $test->class;
        $new->title = $instance->getTitle();
        $new->cover = $instance->getCover();
        $new->description = $instance->getDescription();
        $new->message = $instance->getMessage();
        $new->slug = $test->slug;
        $new->class = $test->class;
        return $new->save();
    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $this->info('+------------------------------------------------+');
        $this->info('-------- Iniciando cache de testes --------------');
        $this->readTests();
        if (!empty($this->tests)) {
            foreach ($this->tests as $test) {
                if ($this->insertNewTest($test)) {
                    $this->info("[+] Teste {$test->slug} cacheado com sucesso.");
                } else {
                    $this->warn("[-] Erro ao cachear teste {$test->slug}");
                }
            }
        }
        $this->info('+------------------------------------------------+');
    }
}
