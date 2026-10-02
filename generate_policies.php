<?php

$entities = [
    'Post',
    'Announcement',
    'Category',
    'Page',
    'Event',
    'Gallery',
    'GalleryItem',
    'Extracurricular',
    'Achievement',
    'Facility',
    'Staff',
    'Download',
    'ContactMessage',
    'Testimonial',
]; // All allowed for operator

foreach ($entities as $model) {
    $operatorCheck = "in_array(\$user->role, ['admin', 'operator'])";
    
    $content = "<?php\n\nnamespace App\Policies;\n\nuse App\Models\\$model;\nuse App\Models\User;\nuse Illuminate\Auth\Access\HandlesAuthorization;\n\nclass {$model}Policy\n{\n    use HandlesAuthorization;\n\n    public function viewAny(User \$user)\n    {\n        return $operatorCheck;\n    }\n\n    public function view(User \$user, $model \$$model)\n    {\n        return $operatorCheck;\n    }\n\n    public function create(User \$user)\n    {\n        return $operatorCheck;\n    }\n\n    public function update(User \$user, $model \$$model)\n    {\n        return $operatorCheck;\n    }\n\n    public function delete(User \$user, $model \$$model)\n    {\n        return $operatorCheck;\n    }\n\n    public function restore(User \$user, $model \$$model)\n    {\n        return \$user->role === 'admin';\n    }\n\n    public function forceDelete(User \$user, $model \$$model)\n    {\n        return \$user->role === 'admin';\n    }\n}\n";

    file_put_contents(__DIR__ . "/app/Policies/{$model}Policy.php", $content);
}

// User Policy: Admin only
$userPolicy = "<?php\n\nnamespace App\Policies;\n\nuse App\Models\User;\nuse Illuminate\Auth\Access\HandlesAuthorization;\n\nclass UserPolicy\n{\n    use HandlesAuthorization;\n\n    public function viewAny(User \$user) { return \$user->role === 'admin'; }\n    public function view(User \$user, User \$model) { return \$user->role === 'admin'; }\n    public function create(User \$user) { return \$user->role === 'admin'; }\n    public function update(User \$user, User \$model) { return \$user->role === 'admin'; }\n    public function delete(User \$user, User \$model) { return \$user->role === 'admin'; }\n    public function restore(User \$user, User \$model) { return \$user->role === 'admin'; }\n    public function forceDelete(User \$user, User \$model) { return \$user->role === 'admin'; }\n}\n";
file_put_contents(__DIR__ . "/app/Policies/UserPolicy.php", $userPolicy);

// Setting Policy: Admin only (but Setting is managed via custom page, which already checks it).

echo "Policies regenerated.\n";
