namespace App\Models;

class Person
{
    public function getName(): string
    {
        return '{{ $name }}';
    }

    public function getAge(): int
    {
        return {{ $age }};
    }
}
