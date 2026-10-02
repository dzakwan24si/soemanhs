<?php

$dir = new RecursiveDirectoryIterator(__DIR__ . '/app');
$iterator = new RecursiveIteratorIterator($dir);

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        
        $original = $content;
        
        $search = [
            'use Filament\Forms\Components\Section;',
            'use Filament\Forms\Components\Grid;',
            'use Filament\Forms\Components\Tabs;',
            'use Filament\Forms\Components\Fieldset;',
            'use Filament\Forms\Components\Group;'
        ];
        
        $replace = [
            'use Filament\Schemas\Components\Section;',
            'use Filament\Schemas\Components\Grid;',
            'use Filament\Schemas\Components\Tabs;',
            'use Filament\Schemas\Components\Fieldset;',
            'use Filament\Schemas\Components\Group;'
        ];
        
        $content = str_replace($search, $replace, $content);
        
        if ($content !== $original) {
            file_put_contents($file->getPathname(), $content);
            echo "Fixed namespace in: " . $file->getPathname() . "\n";
        }
    }
}
