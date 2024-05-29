<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;

class MakeRootLogicCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:153808';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nameSpace = $this->ask('Enter the name space');
        $feature = $this->ask('Enter the feature name.It should be opposite of singular');
        $module = $this->ask('Enter the name of the root modules');
        if ($module != "" && $nameSpace != "" && $feature != "") {
            $logic = $this->ask("Enter the path name of the root Logics");
            if ($logic != "") {
                $this->logicRun($module, $logic, $nameSpace, $feature);
            } else {
                $this->info("");
                $this->info("========================= Sorry!You can't use this features =========================");
                $this->info("");
            }
        } else {
            $this->info("");
            $this->info("========================= Sorry!You can't use this features =========================");
            $this->info("");
        }
    }

    private function logicRun($pathName, $logicPath, $nameSpace, $feature)
    {
        $model = ucwords(Pluralizer::singular($feature));
        $controllerCommand = "{$pathName}~{$nameSpace}.{$feature}/{$model}Controller?path={$logicPath}";
        $resourceCommand = "{$pathName}~{$nameSpace}.{$feature}/{$model}Resource?path={$logicPath}";
        $serviceCommand = "{$pathName}~{$nameSpace}.{$feature}/{$model}Service?path={$logicPath}";
        $requestCommand = "{$pathName}~{$nameSpace}.{$feature}/{$model}Request?path={$logicPath}";
        $this->call("make:customController", [
            'name' => $controllerCommand,
        ]);
        $this->call("make:customResource", [
            'name' => $resourceCommand,
        ]);
        $this->call("make:customService", [
            'name' => $serviceCommand,
        ]);
        $this->call("make:customValidation", [
            'name' => $requestCommand,
        ]);
        $this->info("");
        $this->info("========================= Congratulation you unlock all Logic features =========================");
        $this->info("");
    }

}
