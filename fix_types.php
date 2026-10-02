<?php

$resourcesPath = __DIR__ . '/app/Filament/Resources/';
$dirs = glob($resourcesPath . '*', GLOB_ONLYDIR);

foreach ($dirs as $dir) {
    $resName = basename($dir);
    $resourceFile = $dir . '/' . rtrim($resName, 's') . 'Resource.php';
    if (!file_exists($resourceFile)) {
        if ($resName == 'Categories') $resourceFile = $dir . '/CategoryResource.php';
        else if ($resName == 'Galleries') $resourceFile = $dir . '/GalleryResource.php';
        else if ($resName == 'Facilities') $resourceFile = $dir . '/FacilityResource.php';
        else if ($resName == 'ContactMessages') $resourceFile = $dir . '/ContactMessageResource.php';
        else if ($resName == 'Extracurriculars') $resourceFile = $dir . '/ExtracurricularResource.php';
        else if ($resName == 'Staff') $resourceFile = $dir . '/StaffResource.php';
        else if ($resName == 'Users') $resourceFile = $dir . '/UserResource.php';
    }

    if (file_exists($resourceFile)) {
        $content = file_get_contents($resourceFile);
        $content = preg_replace('/protected static \?string \$navigationGroup/', 'protected static string|\UnitEnum|null $navigationGroup', $content);
        $content = preg_replace('/protected static \?string \$navigationIcon/', 'protected static string|\BackedEnum|null $navigationIcon', $content);
        file_put_contents($resourceFile, $content);
        echo "Fixed types in " . basename($resourceFile) . "\n";
    }
}
