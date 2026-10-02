<?php

$resources = [
    'PostResource' => [
        'label' => 'Berita',
        'plural' => 'Berita',
        'group' => 'Konten',
        'icon' => 'heroicon-o-document-text',
        'sort' => 1
    ],
    'CategoryResource' => [
        'label' => 'Kategori',
        'plural' => 'Kategori',
        'group' => 'Konten',
        'icon' => 'heroicon-o-tag',
        'sort' => 2
    ],
    'AnnouncementResource' => [
        'label' => 'Pengumuman',
        'plural' => 'Pengumuman',
        'group' => 'Konten',
        'icon' => 'heroicon-o-megaphone',
        'sort' => 3
    ],
    'EventResource' => [
        'label' => 'Agenda',
        'plural' => 'Agenda',
        'group' => 'Konten',
        'icon' => 'heroicon-o-calendar-days',
        'sort' => 4
    ],
    'GalleryResource' => [
        'label' => 'Galeri',
        'plural' => 'Galeri',
        'group' => 'Media',
        'icon' => 'heroicon-o-photo',
        'sort' => 1
    ],
    'DownloadResource' => [
        'label' => 'Unduhan',
        'plural' => 'Unduhan',
        'group' => 'Media',
        'icon' => 'heroicon-o-arrow-down-tray',
        'sort' => 2
    ],
    'StaffResource' => [
        'label' => 'Guru dan Staf',
        'plural' => 'Guru dan Staf',
        'group' => 'Profil Sekolah',
        'icon' => 'heroicon-o-users',
        'sort' => 1
    ],
    'FacilityResource' => [
        'label' => 'Fasilitas',
        'plural' => 'Fasilitas',
        'group' => 'Profil Sekolah',
        'icon' => 'heroicon-o-building-office',
        'sort' => 2
    ],
    'ExtracurricularResource' => [
        'label' => 'Ekstrakurikuler',
        'plural' => 'Ekstrakurikuler',
        'group' => 'Profil Sekolah',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 3
    ],
    'AchievementResource' => [
        'label' => 'Prestasi',
        'plural' => 'Prestasi',
        'group' => 'Profil Sekolah',
        'icon' => 'heroicon-o-trophy',
        'sort' => 4
    ],
    'PageResource' => [
        'label' => 'Halaman',
        'plural' => 'Halaman',
        'group' => 'Profil Sekolah',
        'icon' => 'heroicon-o-document-duplicate',
        'sort' => 5
    ],
    'TestimonialResource' => [
        'label' => 'Testimoni',
        'plural' => 'Testimoni',
        'group' => 'Profil Sekolah',
        'icon' => 'heroicon-o-chat-bubble-left-right',
        'sort' => 6
    ],
    'ContactMessageResource' => [
        'label' => 'Pesan Masuk',
        'plural' => 'Pesan Masuk',
        'group' => 'Pengaturan',
        'icon' => 'heroicon-o-envelope',
        'sort' => 1
    ],
    // User isn't generated yet? Wait, did I generate UserResource? Let me check later. If not, I'll generate it.
];

$resourcesPath = __DIR__ . '/app/Filament/Resources/';
$dirs = glob($resourcesPath . '*', GLOB_ONLYDIR);

foreach ($dirs as $dir) {
    $resName = basename($dir);
    // Because `--generate` creates a directory `Posts`, `Categories`, etc.
    // The class is `PostResource`
    // Let's find the resource file inside the directory
    $resourceFile = $dir . '/' . rtrim($resName, 's') . 'Resource.php';
    if (!file_exists($resourceFile)) {
        // Handle names that don't just drop 's', e.g., Categories -> Category
        if ($resName == 'Categories') $resourceFile = $dir . '/CategoryResource.php';
        else if ($resName == 'Galleries') $resourceFile = $dir . '/GalleryResource.php';
        else if ($resName == 'Facilities') $resourceFile = $dir . '/FacilityResource.php';
        else if ($resName == 'ContactMessages') $resourceFile = $dir . '/ContactMessageResource.php';
        else if ($resName == 'Extracurriculars') $resourceFile = $dir . '/ExtracurricularResource.php';
        else if ($resName == 'Staff') $resourceFile = $dir . '/StaffResource.php';
    }

    if (file_exists($resourceFile)) {
        $className = basename($resourceFile, '.php');
        if (isset($resources[$className])) {
            $data = $resources[$className];
            $content = file_get_contents($resourceFile);
            
            // Check if properties already exist, if not, insert them after "protected static ?string $model = ..." or "protected static ?string $navigationIcon = ..."
            $props = "
    protected static ?string \$modelLabel = '{$data['label']}';
    protected static ?string \$pluralModelLabel = '{$data['plural']}';
    protected static ?string \$navigationGroup = '{$data['group']}';
    protected static ?int \$navigationSort = {$data['sort']};
";
            
            // Replace existing navigationIcon
            if (preg_match('/protected static \?string \$navigationIcon = [^;]+;/', $content)) {
                $content = preg_replace('/protected static \?string \$navigationIcon = [^;]+;/', "protected static ?string \$navigationIcon = '{$data['icon']}';\n$props", $content);
            } else {
                $content = preg_replace('/(protected static \?string \$model = [^;]+;)/', "$1\n    protected static ?string \$navigationIcon = '{$data['icon']}';\n$props", $content);
            }
            
            file_put_contents($resourceFile, $content);
            echo "Updated $className\n";
        }
    }
}
