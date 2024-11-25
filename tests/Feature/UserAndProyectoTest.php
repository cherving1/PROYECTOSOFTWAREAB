<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Proyecto;

class UserAndProyectoTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_mass_assign_user_attributes()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);

        $this->assertEquals('john doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertEquals('password123', $user->password);
    }

    /**
     * @test
     */
    public function it_can_mass_assign_proyecto_attributes()
    {
        $proyecto = Proyecto::create([
            'nombreProyecto' => 'Nuevo Proyecto',
            'descripcionProyecto' => 'Descripción del proyecto',
            'responsable' => 'Jane Doe',
            'fechaInicio' => '2024-01-01',
            'fechaFin' => '2024-12-31',
        ]);

        $this->assertEquals('Nuevo Proyecto', $proyecto->nombreProyecto);
        $this->assertEquals('Descripción del proyecto', $proyecto->descripcionProyecto);
        $this->assertEquals('Jane Doe', $proyecto->responsable);
        $this->assertEquals('2024-01-01', $proyecto->fechaInicio);
        $this->assertEquals('2024-12-31', $proyecto->fechaFin);
    }
}
