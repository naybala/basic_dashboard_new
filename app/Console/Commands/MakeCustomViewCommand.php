<?php

namespace App\Console\Commands;

use App\Console\Commands\MakeCommonCommand;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class MakeCustomViewCommand extends Command
{
    protected $signature = 'make:customView {name}';

    protected $description = 'Make Custom View';

    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    ///////////////////////////////This is Method Divider///////////////////////////////////////////

    public function getStoreView()
    {
        return __DIR__ . '/../../../stubs/customViewCreate.stub';
    }

    public function getEditView()
    {
        return __DIR__ . '/../../../stubs/customViewEdit.stub';
    }

    public function getIndexView()
    {
        return __DIR__ . '/../../../stubs/customViewIndex.stub';
    }

    ///////////////////////////////This is Method Divider///////////////////////////////////////////

    public function getStubStoreViewVariables()
    {
        $featureName = $this->commonCommand->filterFolderName($this->argument('name'));
        $featureName = $this->getSingularClassName($featureName);
        return [
            'CAPITAL_CASE' => $featureName,
            'LOWER_CASE' => lcfirst($featureName),
        ];
    }

    public function getStubEditViewVariables()
    {
        $featureName = $this->commonCommand->filterFolderName($this->argument('name'));
        $featureName = $this->getSingularClassName($featureName);
        return [
            'CAPITAL_CASE' => $featureName,
            'LOWER_CASE' => lcfirst($featureName),
        ];
    }

    public function getStubIndexViewVariables()
    {
        $featureName = $this->commonCommand->filterFolderName($this->argument('name'));
        $featureName = $this->getSingularClassName($featureName);
        return [
            'CAPITAL_CASE' => $featureName,
            'LOWER_CASE' => lcfirst($featureName),
        ];
    }

    ///////////////////////////////This is Method Divider///////////////////////////////////////////

    public function getStoreViewSourceFile()
    {
        return $this->getStubStoreViewContents($this->getStoreView(), $this->getStubStoreViewVariables());
    }

    public function getEditViewSourceFile()
    {
        return $this->getStubEditViewContents($this->getEditView(), $this->getStubEditViewVariables());
    }

    public function getIndexViewSourceFile()
    {
        return $this->getStubIndexViewContents($this->getIndexView(), $this->getStubIndexViewVariables());
    }

    ///////////////////////////////This is Method Divider///////////////////////////////////////////

    public function getStoreViewFilePath(): string
    {
        $folderName = $this->commonCommand->filterProjectName($this->argument('name'));
        $featureName = $this->commonCommand->filterFolderName($this->argument('name'));
        $featureName = $this->getSingularClassName($featureName);
        $featureName = lcfirst($featureName);

        return base_path("resources" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR .$featureName) . DIRECTORY_SEPARATOR . "create.blade.php";
    }

    public function getEditViewFilePath(): string
    {
        $folderName = $this->commonCommand->filterProjectName($this->argument('name'));
        $featureName = $this->commonCommand->filterFolderName($this->getSingularClassName($this->argument('name')));
        $featureName = $this->getSingularClassName($featureName);
        $featureName = lcfirst($featureName);
        return base_path("resources" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $featureName) . DIRECTORY_SEPARATOR . "edit.blade.php";
    }

    public function getIndexViewFilePath(): string
    {
        $folderName = $this->commonCommand->filterProjectName($this->argument('name'));
        $featureName = $this->commonCommand->filterFolderName($this->getSingularClassName($this->argument('name')));
        $featureName = $this->getSingularClassName($featureName);
        $featureName = lcfirst($featureName);
        return base_path("resources" . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $featureName) . DIRECTORY_SEPARATOR . "index.blade.php";
    }

    ///////////////////////////////This is Method Divider///////////////////////////////////////////

    public function getStubStoreViewContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }
        return $contents;
    }

    public function getStubEditViewContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }
        return $contents;
    }

    public function getStubIndexViewContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }
        return $contents;
    }

    ///////////////////////////////This is Method Divider///////////////////////////////////////////

    //Make Directory For custom Artisan
    protected $files;

    public function __construct(
        Filesystem $files,
        private MakeCommonCommand $commonCommand,
    ) {
        parent::__construct();
        $this->files = $files;
    }

    protected function makeDirectory($path): mixed
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
        return $path;
    }

    ///////////////////////////////This is Method Divider///////////////////////////////////////////

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->getStoreViewFilePath();
        $this->makeDirectory(dirname($path));
        $contents = $this->getStoreViewSourceFile();

        $pathTwo = $this->getEditViewFilePath();
        $this->makeDirectory(dirname($path));
        $contentTwo = $this->getEditViewSourceFile();

        $pathThree = $this->getIndexViewFilePath();
        $this->makeDirectory(dirname($path));
        $contentThree = $this->getIndexViewSourceFile();

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->files->put($pathTwo, $contentTwo);
            $this->files->put($pathThree, $contentThree);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }
}