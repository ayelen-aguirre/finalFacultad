<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Noticia;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CrearNoticiaTest extends DuskTestCase
{
    use WithFaker;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->create([
            'email' => $this->faker->email(),
            'password' => Hash::make('2222222222')
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('http://noticiaslaravel.test/login')
            ->type('email', $user->email)
            ->type('password', '2222222222')
            ->press('Acceder')
            ->assertPathIs('/Noticia');
        });
    }

    public function testNewNoticia()
    {
        $this->browse(function ($browser){
            $browser->visit("http://noticiaslaravel.test/Noticia/create")
            ->type('titulo', $this->faker->sentence(2))
            ->type('cuerpo', $this->faker->sentence(6))
            ->select('autor')
            ->select('carrera_id')
            ->check('etiqueta5')
            ->screenshot('/Noticia/nuevaNoticia')
            ->press('Guardar datos')
            ->assertPathIs('/Noticia');
        });
    }

    public function testEditNoticia()
    {
        $this->browse(function ($browser){
            $browser->visit("http://noticiaslaravel.test/Noticia/2/edit")
            ->type('titulo', $this->faker->sentence(2))
            ->type('cuerpo', $this->faker->sentence(12))
            ->select('carrera_id')
            ->check('etiqueta10')
            ->check('etiqueta21')
            ->screenshot('/Noticia/editNoticia2')
            ->press('Guardar datos')
            ->assertPathIs('/Noticia');
        });
    }

    public function testDeleteNoticia()
    {
        $id = Noticia::latest()->first()->id; 
        $url = "http://noticiaslaravel.test/Noticia/$id";
        $boton = "Eliminar noticia";
        $this->browse(function ($browser) use ($url, $boton){
            $browser->visit($url)
            ->screenshot('/Noticia/deleteNoticia')
            ->press( $boton)
            ->screenshot('/Noticia/deleteNoticiaConfirm')
            ->assertPathIs('/Noticia');
        });
    }

}
