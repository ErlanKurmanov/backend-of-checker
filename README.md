Создание фейкового user.
```php artisan tinker```
Вставьте этот код для создание токена в консоли:
```
use App\Models\User;
use Illuminate\Support\Facades\Hash;
$user = User::where('email', 'test@example.com')->first();
if (!$user) {
    $user = User::create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => Hash::make('password123'), // Не забудь, bcrypt или Hash::make!
    ]);
}
$token = $user->createToken('vue-app-token')->plainTextToken;
echo $token;
```
Получив токен некобходимо вставить во frontend часть в переменную apiToken в файле src\views\DomainChecker.vue
ссылка на frontend: https://github.com/ErlanKurmanov/frontend-of-checker
