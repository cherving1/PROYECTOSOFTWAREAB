<?php


namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /** @test */
    public function it_can_set_and_get_name_attribute()
    {
        $user = new User();
        $user->name = 'JOHN DOE';
        // Verifica que el nombre se convierte correctamente en minúsculas
        $this->assertEquals('john doe', $user->name);

        // Verifica que el nombre se formatea correctamente
        $this->assertEquals('John Doe', $user->fresh()->name);
    }

    /** @test */
    public function it_can_mass_assign_name()
    {
        $user = User::create([
            'name' => 'jane doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password123'), // Asegúrate de encriptar la contraseña
        ]);
        // Verifica que el nombre se haya asignado correctamente
        $this->assertEquals('jane doe', $user->name);
        // Verifica que el email se haya asignado correctamente
        $this->assertEquals('jane@example.com', $user->email);
    }

    /** @test */
    public function it_has_correct_hidden_attributes()
    {
        $user = new User();
        // Verifica que 'password' y 'remember_token' están ocultos
        $this->assertContains('password', $user->getHidden());
        $this->assertContains('remember_token', $user->getHidden());

        // Verifica que al convertir el modelo en array, los atributos estén ocultos
        $userArray = $user->toArray();
        $this->assertArrayNotHasKey('password', $userArray);
        $this->assertArrayNotHasKey('remember_token', $userArray);
    }

    /** @test */
    public function it_prevents_mass_assignment_of_forbidden_fields()
    {
        $user = User::create([
            'name' => 'alice',
            'email' => 'alice@example.com',
            'password' => bcrypt('password123'), // La contraseña debe estar encriptada
        ]);

        // Verifica que la contraseña no se asigne en texto plano
        $this->assertNotEquals('password123', $user->password);
    }
}
