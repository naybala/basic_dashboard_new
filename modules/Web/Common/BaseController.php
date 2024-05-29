<?php

namespace BasicDashboard\Web\Common;

use App\Http\Controllers\Controller;

/**
 * A base controller for return for common methods.
 *
 * @author Nay Ba la
 * 
 */

class BaseController extends Controller
{
    //Common View Used for Index and Edit
    public function returnView($viewPath, $data, $keyword = "")
    {
        return view($viewPath, [
            'data' => $data,
            'keyword' => isset($keyword) ? $keyword : '',
        ]);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
    //Common Redirect Used for Store,Update and Destroy
    public function redirectRoute($routePath, $successMessage)
    {
        return to_route($routePath)->with([
            'success' => $successMessage,
        ]);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
    //Common Custom Error Exception For User
    public function redirectBackWithError($repo, $e)
    {
        $repo->rollBack();
        return redirect()->back()->with([
            'errorHr' => $e->getMessage(),
        ]);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function redirectBackWithCustomError($repo, $e)
    {
        $repo->rollBack();
        return redirect()->back()->with([
            'errorHr' => $e->messages(),
        ]);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function captureMemory(): int
    {
        return memory_get_usage();
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function calculateMemory($startMemory, $endMemory): string
    {
        $memoryUsed = round(($endMemory - $startMemory) / 1048576, 2);
        $memoryUsed = $memoryUsed . ' mb';
        return $memoryUsed;
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function captureTime(): string
    {
        return microtime(true);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function calculateTime($startTime, $endTime): string
    {
        $time = $endTime - $startTime;
        $time = $time . ' sec';
        return $time;
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
}