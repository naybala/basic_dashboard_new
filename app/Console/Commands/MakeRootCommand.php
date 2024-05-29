<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Pluralizer;

class MakeRootCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:153';

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
            $view = $this->ask("Enter the view path(UI directory resources/views/??)");
            $logic != "" ? $this->allRun($module, $logic, $nameSpace, $feature, $view) :
            $this->allRun($module, false, $nameSpace, $feature, false);
        } else {
            $this->info("");
            $this->info("========================= Sorry you can't use repo features ==========================");
            $this->info("");
        }
    }

    private function allRun($pathName, $logicPath, $nameSpace, $feature, $view)
    {
        $model = ucwords(Pluralizer::singular($feature));
        $moduleRepoCommand = "$pathName~$nameSpace.$feature/$model";
        $controllerCommand = "{$pathName}~{$nameSpace}.{$feature}/{$model}Controller?path={$logicPath}";
        $resourceCommand = "{$pathName}~{$nameSpace}.{$feature}/{$model}Resource?path={$logicPath}";
        $serviceCommand = "{$pathName}~{$nameSpace}.{$feature}/{$model}Service?path={$logicPath}";
        $requestCommand = "{$pathName}~{$nameSpace}.{$feature}/{$model}Request?path={$logicPath}";
        if ($logicPath === false) {
            $this->call("make:module", [
                'name' => $moduleRepoCommand,
            ]);
            $this->call("make:repo", [
                'name' => $moduleRepoCommand,
            ]);
            $this->info("");
            $this->info("========================= Congratulation you unlock repo features =========================");
            $this->info("");
        } else {
            $this->call("make:module", [
                'name' => $moduleRepoCommand,
            ]);
            $this->call("make:repo", [
                'name' => $moduleRepoCommand,
            ]);
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
            $this->info("========================= Congratulation you unlock all features =========================");
            $this->info("");
        }

    }

}