<?php

namespace Tests\Browser;

use App\Models\Etiqueta;
use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EtiquetaTest extends DuskTestCase
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

    public function testNewEtiqueta()
    {
        $this->browse(function ($browser){
            $browser->visit("http://noticiaslaravel.test/Etiqueta/create")
            ->type('nombre', $this->faker->sentence(1))
            ->type('descripcion', $this->faker->sentence(6))
            ->screenshot('/Etiqueta/nuevaEtiqueta')
            ->press('Guardar datos')
            ->assertPathIs('/Etiqueta');
        });
    }

    public function testEditEtiqueta(){
        $this->browse(function ($browser){
            $browser->visit("http://noticiaslaravel.test/Etiqueta/3/edit")
            ->type('nombre', $this->faker->sentence(1))
            ->type('descripcion', $this->faker->sentence(6))
            ->screenshot('/Etiqueta/editEtiqueta3')
            ->press('Guardar datos')
            ->assertPathIs('/Etiqueta');
        });
    }

    public function testDeleteEtiqueta(){
        $e = Etiqueta::all()->count(); 
        $page = $e / 6;
        $page = ceil($page);
        $id = Etiqueta::latest()->first()->id; 
        $this->browse(function ($browser) use ($id, $page){
            $browser->visit("http://noticiaslaravel.test/Etiqueta?page=$page")
            ->click("@eliminarEtiqueta$id") // atributo dusk
            ->storeSource('modalEtiqueta')
            ->whenAvailable('@modal'.$id, function ($modal) {
                $modal->pause(1000)
                    ->assertSee('¿Está seguro que desea eliminar la etiqueta seleccionada?')
                    ->screenshot('/Etiqueta/deleteEtiqueta')
                    ->press('Eliminar etiqueta')
                    ->screenshot('/Etiqueta/deleteEtiquetaConfirm')
                    ->storeSource('modalEtiqueta2')
                    ->assertPathIs('/Etiqueta');
            });
        });
    }
}
